<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Load library session
        $this->load->library('session');
        // Load helper URL
        $this->load->helper('url');
    }

    public function index()
    {
        // Load the 'welcome_message' view
        $this->load->view('welcome_message');
    }

    public function about()
    {
        // Load the cURL library
        $this->load->library('curl');

        // cURL options
        $options = array(
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false,
        );

        $this->curl->create('http://localhost:8080/lokasi');
        $this->curl->options($options);
        $response = $this->curl->execute();

        if ($this->curl->error_code) {
            $data['lokasi'] = [];
        } else {
            // Decode JSON into an array
            $data['lokasi'] = json_decode($response, true);
        }

        // Load the 'about' view with lokasi data
        $this->load->view('about', $data);
    }

    public function create()
    {
        // Retrieve data from POST request
        $data = array(
            'namaLokasi' => $this->input->post('namaLokasi'),
            'negara' => $this->input->post('negara'),
            'provinsi' => $this->input->post('provinsi'),
            'kota' => $this->input->post('kota'),
            'createdAt' => $this->input->post('createdAt')
        );

        // URL endpoint
        $url = 'http://localhost:8080/lokasi';

        // Initialize cURL
        $ch = curl_init($url);

        // Set cURL options
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json'
        ));

        // Execute cURL
        $response = curl_exec($ch);
        $error = curl_error($ch);

        // Close cURL
        curl_close($ch);

        // Debug response
        if ($response === false) {
            $this->session->set_flashdata('error', 'cURL Error: ' . $error);
        } else {
            $this->session->set_flashdata('success', 'Data berhasil dikirim: ' . $response);
        }

        // Redirect back to the about page
        redirect('welcome/about');
    }

    public function edit($id)
    {
        // Log the ID received
        log_message('debug', 'Loading edit form for ID: ' . $id);

        // URL endpoint to get location data by ID
        $url = 'http://localhost:8080/lokasi/' . $id;

        // Initialize cURL
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        // Execute cURL
        $response = curl_exec($ch);
        curl_close($ch);

        if ($response === false) {
            $this->session->set_flashdata('error', 'Failed to retrieve location data');
            redirect('welcome/about');
        } else {
            $data['lokasi'] = json_decode($response, true);
            if (empty($data['lokasi'])) {
                $this->session->set_flashdata('error', 'Location data not found.');
                redirect('welcome/about');
            } else {
                // Log the data received from the API
                log_message('debug', 'Location data received: ' . print_r($data['lokasi'], true));
                
                // Load the 'edit_view' with location data
                $this->load->view('edit_view', $data);
            }
        }
    }

    public function update()
    {
        $id = $this->input->post('id');
        log_message('debug', 'ID received for update: ' . $id);

        if (!$id) {
            log_message('error', 'ID is missing in the POST request.');
            $this->session->set_flashdata('error', 'ID for update not found.');
            redirect('welcome/about');
            return;
        }

        // Data to be updated
        $data = array(
            'namaLokasi' => $this->input->post('namaLokasi'),
            'negara' => $this->input->post('negara'),
            'provinsi' => $this->input->post('provinsi'),
            'kota' => $this->input->post('kota'),
        );

        $json_data = json_encode($data);
        log_message('debug', 'Data to be sent to API: ' . $json_data);

        // URL endpoint for update
        $url = 'http://localhost:8080/lokasi/' . $id;

        // Initialize cURL
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($json_data)
        ));

        // Execute cURL
        $response = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $error = curl_error($ch);
        curl_close($ch);

        log_message('debug', 'API response: ' . $response);
        log_message('debug', 'HTTP Code from API: ' . $http_code);
        log_message('debug', 'cURL error: ' . $error);

        if ($http_code !== 200 || $response === false) {
            $this->session->set_flashdata('error', 'Failed to update location data: ' . $error);
        } else {
            $this->session->set_flashdata('success', 'Location data successfully updated');
        }

        // Redirect back to the about page
        redirect('welcome/about');
    }

    public function delete($id)
    {
        // URL endpoint to delete location data by ID
        $url = 'http://localhost:8080/lokasi/' . $id;

        // Initialize cURL
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");

        // Execute cURL
        $response = curl_exec($ch);
        $error = curl_error($ch);
        curl_close($ch);

        // Debugging response
        log_message('debug', 'Response from API: ' . print_r($response, true));
        log_message('debug', 'cURL error: ' . print_r($error, true));

        if ($response === false) {
            $this->session->set_flashdata('error', 'Failed to delete location data: ' . $error);
        } else {
            $this->session->set_flashdata('success', 'Location data successfully deleted');
        }

        // Redirect back to the about page
        redirect('welcome/about');
    }
}
