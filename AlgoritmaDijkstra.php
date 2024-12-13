<?php
require_once 'PriorityQueue.php';

function dijkstra($graph, $source) {
    $dist = [];
    $processed = [];
    $pq = new PriorityQueue();

    foreach ($graph as $vertex => $neighbors) {
        $dist[$vertex] = INF;
    }
    $dist[$source] = 0;
    $pq->enqueue($source, 0);

    while ($pq->peek() !== null) {
        $currentNode = $pq->dequeue();
        $current = $currentNode['value'];
        $currentDist = $currentNode['priority'];

        if (isset($processed[$current])) {
            continue;
        }
        $processed[$current] = true;

        foreach ($graph[$current] as $neighbor => $weight) {
            $newDist = $currentDist + $weight;
            if ($newDist < $dist[$neighbor]) {
                $dist[$neighbor] = $newDist;
                $pq->enqueue($neighbor, $newDist);
            }
        }
    }

    return $dist;
}

$graph = [
    'A' => ['B' => 1, 'C' => 2],
    'B' => ['C' => 2, 'D' => 1],
    'C' => ['D' => 3],
    'D' => [],
];

$dijkstraResult = dijkstra($graph, 'A');
echo "Dijkstra Result:\n";
print_r($dijkstraResult);

