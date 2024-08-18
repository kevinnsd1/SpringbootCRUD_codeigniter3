package com.example.proyek.service;

import java.time.LocalDateTime;
import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import com.example.proyek.entity.Lokasi;
import com.example.proyek.repository.LokasiRepository;

@Service
public class LokasiService {

    @Autowired
    private LokasiRepository lokasiRepository;

    public Lokasi addLokasi(Lokasi lokasi) {
        // `createdAt` akan diatur sesuai dengan @PrePersist jika tidak ada nilai dalam request body
        return lokasiRepository.save(lokasi);
    }   

    public List<Lokasi> getAllLokasi() {
        return lokasiRepository.findAll();
    }

    public Lokasi updateLokasi(Lokasi lokasi) {
        Lokasi existingLokasi = lokasiRepository.findById(lokasi.getId())
                .orElseThrow(() -> new RuntimeException("Lokasi not found"));
        existingLokasi.setNamaLokasi(lokasi.getNamaLokasi());
        existingLokasi.setNegara(lokasi.getNegara());
        existingLokasi.setProvinsi(lokasi.getProvinsi());
        existingLokasi.setKota(lokasi.getKota());
        return lokasiRepository.save(existingLokasi);
    }

    public void deleteLokasi(Integer id) {
        lokasiRepository.deleteById(id);
    }
}
