<?php
require_once 'Max-Heap.php'; // Pastikan path file benar

class PriorityQueue {
  private $heap;

  public function __construct() {
      $this->heap = new MaxHeap();
  }

  // Menambahkan elemen ke Priority Queue
  public function enqueue($value, $priority) {
      $this->heap->insert(['value' => $value, 'priority' => $priority]);
  }

  // Menghapus elemen prioritas tertinggi
  public function dequeue() {
      return $this->heap->removeMax();  // Pastikan ini mengembalikan array ['value' => $value, 'priority' => $priority]
  }

  // Melihat elemen prioritas tertinggi
  public function peek() {
      return $this->heap->peek();
  }
}

// Penggunaan Priority Queue
$pq = new PriorityQueue();

// Masukkan nilai dan prioritas
$pq->enqueue(15, 1); // Menyisipkan 15 dengan prioritas 1
$pq->enqueue(30, 2); // Menyisipkan 30 dengan prioritas 2
$pq->enqueue(10, 3); // Menyisipkan 10 dengan prioritas 3

echo "Priority Queue Peek: " . $pq->peek()['value'] . PHP_EOL; // Output: 10 (elemen dengan prioritas tertinggi)
echo "Priority Queue Dequeue: " . $pq->dequeue()['value'] . PHP_EOL; // Output: 10
