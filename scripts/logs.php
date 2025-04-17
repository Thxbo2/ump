<?php
    function log_error($connection, $message, $type, $identity) {
        // Log the error message to a file or database
        $statement = $connection->prepare("INSERT INTO logs (NULL, `message`, `identity`, `date`) VALUES (?,?,?)");
        $statement->execute([$message, $type, $identity]);
    }
?>