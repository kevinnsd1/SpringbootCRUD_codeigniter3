package com.example.proyek.service;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import com.example.proyek.entity.Proyek;
import com.example.proyek.repository.ProyekRepository;

@Service
public class ProyekService {

    @Autowired
    private ProyekRepository proyekRepository;

    public Proyek addProyek(Proyek proyek) {
        return proyekRepository.save(proyek);
    }

    public List<Proyek> getAllProyek() {
        return proyekRepository.findAll();
    }

    public Proyek updateProyek(Proyek proyek) {
        if (proyek.getId() != null && proyekRepository.existsById(proyek.getId())) {
            return proyekRepository.save(proyek);
        } else {
            throw new IllegalArgumentException("Proyek not found");
        }
    }

    public void deleteProyek(Integer id) {
        if (proyekRepository.existsById(id)) {
            proyekRepository.deleteById(id);
        } else {
            throw new IllegalArgumentException("Proyek not found");
        }
    }
}
