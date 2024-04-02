<?php
class Mahasiswa {
    public $nim;
    public $nama;
    public $kuliah;
    public $mata_kuliah;
    public $nilai;
    public $grade;
    public $predikat;
    public $status;

    public function __construct($nim, $nama, $kuliah, $mata_kuliah, $nilai) {
        $this->nim = $nim;
        $this->nama = $nama;
        $this->kuliah = $kuliah;
        $this->mata_kuliah = $mata_kuliah;
        $this->nilai = $nilai;
        $this->calculateGrade();
        $this->calculatePredikat();
        $this->calculateStatus();
    }

    private function calculateGrade() {
        if ($this->nilai >= 85) {
            $this->grade = 'A';
        } elseif ($this->nilai >= 70) {
            $this->grade = 'B';
        } elseif ($this->nilai >= 69) {
            $this->grade = 'C';
        } elseif ($this->nilai >= 60) {
            $this->grade = 'D';
        } else {
            $this->grade = 'E';
        }
    }

    private function calculatePredikat() {
        switch ($this->grade) {
            case 'A':
                $this->predikat = 'Sangat Memuaskan';
                break;
            case 'B':
                $this->predikat = 'Memuaskan';
                break;
            case 'C':
                $this->predikat = 'Cukup';
                break;
            case 'D':
                $this->predikat = 'Kurang';
                break;
            default:
                $this->predikat = 'Sangat Kurang';
        }
    }

    private function calculateStatus() {
        $this->status = ($this->nilai >= 65) ? 'Lulus' : 'Tidak Lulus';
    }
}
?>
