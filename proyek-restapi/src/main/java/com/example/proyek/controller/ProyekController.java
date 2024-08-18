package com.example.proyek.controller;

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

import com.example.proyek.entity.Proyek;
import com.example.proyek.service.ProyekService;

@RestController
@RequestMapping("/proyek")
public class ProyekController {

    @Autowired
    private ProyekService proyekService;

    @PostMapping
    public Proyek addProyek(@RequestBody Proyek proyek) {
        return proyekService.addProyek(proyek);
    }

    @GetMapping
    public List<Proyek> getAllProyek() {
        return proyekService.getAllProyek();
    }

    @PutMapping
    public Proyek updateProyek(@RequestBody Proyek proyek) {
        return proyekService.updateProyek(proyek);
    }

    @DeleteMapping("/{id}")
    public void deleteProyek(@PathVariable Integer id) {
        proyekService.deleteProyek(id);
    }
}
