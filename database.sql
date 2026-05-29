-- CATATAN UNTUK PENGGUNA BARU:
-- 1. Buat database terlebih dahulu di PostgreSQL: CREATE DATABASE motor;
-- 2. Masuk ke database tersebut: \c motor
-- 3. Jalankan query di bawah ini untuk membuat tabel:

CREATE TABLE motor_yamaha (
    id SERIAL PRIMARY KEY,
    tipe_motor VARCHAR(100) NOT NULL,
    warna VARCHAR(50) NOT NULL,
    cc_mesin INT NOT NULL
);

-- (Opsional) Jalankan query ini untuk memasukkan data awal / dummy
INSERT INTO motor_yamaha (tipe_motor, warna, cc_mesin) VALUES
('NMAX Connected', 'Matte Black', 155),
('Aerox 155 CyberCity', 'Cyan', 155),
('MT-15', 'Metallic Dark Grey', 155);