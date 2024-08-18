package com.example.proyek.repository;

import org.springframework.data.jpa.repository.JpaRepository;
import com.example.proyek.entity.Proyek;

public interface ProyekRepository extends JpaRepository<Proyek, Integer> {
}

