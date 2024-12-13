<?php
function kruskal($edges, $vertices) {
    usort($edges, function ($a, $b) {
        return $a[2] - $b[2];
    });

    $parent = [];
    foreach ($vertices as $vertex) {
        $parent[$vertex] = $vertex;
    }

    function find($v, &$parent) {
        if ($parent[$v] !== $v) {
            $parent[$v] = find($parent[$v], $parent);
        }
        return $parent[$v];
    }

    function union($v1, $v2, &$parent) {
        $root1 = find($v1, $parent);
        $root2 = find($v2, $parent);
        $parent[$root2] = $root1;
    }

    $mst = [];
    foreach ($edges as $edge) {
        list($u, $v, $weight) = $edge;
        if (find($u, $parent) !== find($v, $parent)) {
            union($u, $v, $parent);
            $mst[] = $edge;
        }
    }

    return $mst;
}

// Graph untuk Kruskal
$vertices = ['A', 'B', 'C', 'D'];
$edges = [
    ['A', 'B', 1],
    ['A', 'C', 4],
    ['B', 'C', 2],
    ['B', 'D', 6],
    ['C', 'D', 3],
];

$kruskalResult = kruskal($edges, $vertices);
echo "Kruskal MST:\n";
print_r($kruskalResult);
