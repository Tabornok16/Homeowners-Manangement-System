<?php
            // Include connect.php to establish database connection
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "hoa_db";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Query to count total registered properties
            $sql = "SELECT COUNT(*) AS totalProperties FROM property";

            // Execute the query
            $result = $conn->query($sql);

            if ($result) {
              // Fetch the result as an associative array
              $row = $result->fetch_assoc();

              // Check if the result is not empty
              if ($row) {
                // Get the total properties count
                $totalProperties = $row['totalProperties'];

                // Display the total properties count
                echo '<h3>' . $totalProperties . '</h3>';
              } else {
                // If the result is empty, display an error message or default value
                echo '<h3>Error</h3>';
              }
            } else {
              // If query execution fails, display an error message or default value
              echo '<h3>Error</h3>';
            }

            // Close database connection
            $conn->close();
            ?>