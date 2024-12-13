<?php

class MaxHeap {
    private $heap;

    public function __construct() {
        $this->heap = [];
    }

    // Menambahkan elemen ke heap
    public function insert($value) {
        $this->heap[] = $value;
        $this->heapifyUp(count($this->heap) - 1);
    }

    // Menghapus elemen maksimum dari heap
    public function removeMax() {
        if (count($this->heap) === 0) {
            throw new Exception("Heap kosong");
        }
        $max = $this->heap[0];
        $this->heap[0] = array_pop($this->heap);
        $this->heapifyDown(0);
        return $max;
    }

    // Mengembalikan elemen maksimum
    public function peek() {
        return $this->heap[0] ?? null;
    }

    // Heapify ke atas
    private function heapifyUp($index) {
        while ($index > 0) {
            $parentIndex = intval(($index - 1) / 2);
            if ($this->heap[$index] > $this->heap[$parentIndex]) {
                $this->swap($index, $parentIndex);
                $index = $parentIndex;
            } else {
                break;
            }
        }
    }

    // Heapify ke bawah
    private function heapifyDown($index) {
        $largest = $index;
        $left = 2 * $index + 1;
        $right = 2 * $index + 2;

        if ($left < count($this->heap) && $this->heap[$left] > $this->heap[$largest]) {
            $largest = $left;
        }

        if ($right < count($this->heap) && $this->heap[$right] > $this->heap[$largest]) {
            $largest = $right;
        }

        if ($largest !== $index) {
            $this->swap($index, $largest);
            $this->heapifyDown($largest);
        }
    }

    // Menukar elemen di heap
    private function swap($i, $j) {
        $temp = $this->heap[$i];
        $this->heap[$i] = $this->heap[$j];
        $this->heap[$j] = $temp;
    }
}

// Penggunaan Max-Heap
$heap = new MaxHeap();
$heap->insert(10);
$heap->insert(20);
$heap->insert(5);
$heap->insert(30);

echo "Nama: Andriana Rizki Barokah " . PHP_EOL; 
echo "NIM: 231232008 " . PHP_EOL; 
echo "--------------------------------- " . PHP_EOL; 
echo "Max Heap Peek: " . $heap->peek() . PHP_EOL; // Output: 30
echo "Max Heap RemoveMax: " . $heap->removeMax() . PHP_EOL; // Output: 30

