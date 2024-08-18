package com.example.proyek.controller;

import java.time.LocalDateTime;
import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.DeleteMapping;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.PutMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import com.example.proyek.entity.Lokasi;
import com.example.proyek.service.LokasiService;

@RestController
@RequestMapping("/lokasi")
public class LokasiController {

    @Autowired
    private LokasiService lokasiService;

    @PostMapping
    public Lokasi addLokasi(@RequestBody Lokasi lokasi) {
        return lokasiService.addLokasi(lokasi);
    }
    

    @GetMapping
    public List<Lokasi> getAllLokasi() {
        return lokasiService.getAllLokasi();
    }

    @PutMapping
    public Lokasi updateLokasi(@RequestBody Lokasi lokasi) {
        return lokasiService.updateLokasi(lokasi);
    }

    @DeleteMapping("/{id}")
    public void deleteLokasi(@PathVariable Integer id) {
        lokasiService.deleteLokasi(id);
    }
}

