<?php


// Check if form submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

$url = stripcslashes($_POST['Url']);
    $timout = "660";    
    
    

    // var_dump($url);
    // var_dump($timout);


    $scripts = [
       // "toolsScripts/commix.sh",
        "toolsScripts/nmap.sh",
        "toolsScripts/zapScript.sh",
        "toolsScripts/Nuclei.sh",
        "toolsScripts/nikto.sh",
        "toolsScripts/wapiti.sh",
        "toolsScripts/whatweb.sh",
        "toolsScripts/sqlmap.sh",
        "toolsScripts/XSStrike.sh",
       "toolsScripts/arachni.sh",
    ];
    


    
    $processes = [];
    // $output = shell_exec("toolsScripts/commix.sh $url $timout");
    foreach ($scripts as $script) {
        $descriptorspec = [
            0 => ["pipe", "r"],  // stdin
            1 => ["pipe", "w"],  // stdout
            2 => ["pipe", "w"]   // stderr
        ];
    
        $command = "bash " . $script . " " . escapeshellarg($url) . " " . $timout;
        $process = proc_open($command, $descriptorspec, $pipes);
    
        if (is_resource($process)) {
            $processes[] = [
                'process' => $process,
                'pipes' => $pipes
            ];
        }
    }
    
    foreach ($processes as $process) {
        $output = stream_get_contents($process['pipes'][1]);
        fclose($process['pipes'][1]);
        fclose($process['pipes'][2]);
        proc_close($process['process']);

    }

    $endPar = microtime(true); // End time
    $executionPar_time = $endPar - $startPar; // Calculate elapsed time

// foreach ($scripts as $tool) {
//     $start = microtime(true);

  
//     $output = shell_exec("bash $tool " . escapeshellarg($url) . $timout);

//     $end = microtime(true);
//     $duration = $end - $start;

   
//     $results[] = [
//         'tool' => $tool,
//         'time' => $duration,
        
//     ];
// }

    $output2 = shell_exec("bash compailation.sh $url");
     $output3 = shell_exec("bash ai.sh ");

    /************************************************************************standard response from chatgpt4o ******************************************************/
//      $output3 = "Response from ChatGPT:
// Based on the provided report, here is a structured list of vulnerabilities, including CWEs, their descriptions, solutions, attack vectors, and severity levels. Note that no CVEs were mentioned in the report.

// ### CWEs

// 1. **CWE-1004: Sensitive Cookie Without 'HttpOnly' Flag**
//    - **Link**: [CWE-1004](https://cwe.mitre.org/data/definitions/1004.html)
//    - **Description**: Cookies without the 'HttpOnly' flag can be accessed via JavaScript, which increases the risk of session hijacking.
//    - **Solution**: Set the 'HttpOnly' attribute for cookies to prevent access via JavaScript.
//    - **Attack Vector**: NETWORK
//    - **Severity**: MEDIUM

// 2. **CWE-1021: Improper Restriction of Rendered UI Layers or Frames**
//    - **Link**: [CWE-1021](https://cwe.mitre.org/data/definitions/1021.html)
//    - **Description**: The application does not properly restrict the rendering of UI layers or frames, which can lead to clickjacking attacks.
//    - **Solution**: Implement X-Frame-Options header to prevent framing.
//    - **Attack Vector**: NETWORK
//    - **Severity**: MEDIUM

// 3. **CWE-1275: Sensitive Cookie in HTTPS Session Without 'Secure' Attribute**
//    - **Link**: [CWE-1275](https://cwe.mitre.org/data/definitions/1275.html)
//    - **Description**: Cookies in HTTPS sessions without the 'Secure' attribute can be sent over unencrypted connections.
//    - **Solution**: Ensure cookies have the 'Secure' attribute set.
//    - **Attack Vector**: NETWORK
//    - **Severity**: MEDIUM

// 4. **CWE-319: Cleartext Transmission of Sensitive Information**
//    - **Link**: [CWE-319](https://cwe.mitre.org/data/definitions/319.html)
//    - **Description**: Sensitive information is transmitted in cleartext, which can be intercepted by attackers.
//    - **Solution**: Use encryption protocols like TLS to protect data in transit.
//    - **Attack Vector**: NETWORK
//    - **Severity**: HIGH

// 5. **CWE-436: Interpretation Conflict**
//    - **Link**: [CWE-436](https://cwe.mitre.org/data/definitions/436.html)
//    - **Description**: Different components interpret the same data differently, leading to security issues.
//    - **Solution**: Ensure consistent data interpretation across components.
//    - **Attack Vector**: NETWORK
//    - **Severity**: LOW

// 6. **CWE-525: Use of Web Browser Cross-Domain Capabilities**
//    - **Link**: [CWE-525](https://cwe.mitre.org/data/definitions/525.html)
//    - **Description**: The application uses cross-domain capabilities of web browsers, which can lead to security risks.
//    - **Solution**: Limit cross-domain requests and use CORS headers appropriately.
//    - **Attack Vector**: NETWORK
//    - **Severity**: MEDIUM

// 7. **CWE-565: Reliance on Cookies without Validation and Integrity Checking**
//    - **Link**: [CWE-565](https://cwe.mitre.org/data/definitions/565.html)
//    - **Description**: The application relies on cookies without validating their integrity, which can be tampered with.
//    - **Solution**: Implement integrity checks for cookies.
//    - **Attack Vector**: NETWORK
//    - **Severity**: MEDIUM

// 8. **CWE-614: Sensitive Cookie in HTTPS Session Without 'Secure' Attribute**
//    - **Link**: [CWE-614](https://cwe.mitre.org/data/definitions/614.html)
//    - **Description**: Similar to CWE-1275, this involves cookies in HTTPS sessions lacking the 'Secure' attribute.
//    - **Solution**: Ensure cookies have the 'Secure' attribute set.
//    - **Attack Vector**: NETWORK
//    - **Severity**: MEDIUM

// 9. **CWE-615: Inclusion of Sensitive Information in HTTP Headers**
//    - **Link**: [CWE-615](https://cwe.mitre.org/data/definitions/615.html)
//    - **Description**: Sensitive information is included in HTTP headers, which can be exposed.
//    - **Solution**: Avoid sending sensitive information in HTTP headers.
//    - **Attack Vector**: NETWORK
//    - **Severity**: HIGH

// 10. **CWE-693: Protection Mechanism Failure**
//     - **Link**: [CWE-693](https://cwe.mitre.org/data/definitions/693.html)
//     - **Description**: A protection mechanism fails to provide adequate security.
//     - **Solution**: Review and strengthen security mechanisms.
//     - **Attack Vector**: NETWORK
//     - **Severity**: HIGH

// ### Other Vulnerabilities

// 11. **Missing X-Frame-Options Header**
//     - **Description**: The anti-clickjacking X-Frame-Options header is not present.
//     - **Solution**: Implement the X-Frame-Options header to prevent clickjacking.
//     - **Attack Vector**: NETWORK
//     - **Severity**: MEDIUM

// 12. **Missing Strict-Transport-Security Header**
//     - **Description**: The site uses TLS, but the Strict-Transport-Security HTTP header is not defined.
//     - **Solution**: Implement the Strict-Transport-Security header to enforce secure connections.
//     - **Attack Vector**: NETWORK
//     - **Severity**: MEDIUM

// 13. **Missing X-Content-Type-Options Header**
//     - **Description**: The X-Content-Type-Options header is not set, allowing content to be rendered differently than the MIME type.
//     - **Solution**: Set the X-Content-Type-Options header to 'nosniff'.
//     - **Attack Vector**: NETWORK
//     - **Severity**: MEDIUM

// 14. **Content Security Policy (CSP) Not Set**
//     - **Description**: CSP is not set, which can lead to various types of attacks such as XSS.
//     - **Solution**: Implement a Content Security Policy to mitigate XSS and other attacks.
//     - **Attack Vector**: NETWORK
//     - **Severity**: HIGH

// 15. **X-XSS-Protection Not Set**
//     - **Description**: The X-XSS-Protection header is not set, which can leave the application vulnerable to XSS attacks.
//     - **Solution**: Set the X-XSS-Protection header to enable the browser's XSS filter.
//     - **Attack Vector**: NETWORK
//     - **Severity**: MEDIUM

// This list provides a comprehensive overview of the vulnerabilities identified in the report, along with recommended solutions and severity assessments.
//  ";
    
}

// Extract Links
function extractLinks($text) {
    preg_match_all('/- \*\*Link\*\*: \[(.*?)\]\((.*?)\)/', $text, $matches);
    return $matches[2]; // Returns only the URLs
}

// Extract Descriptions
function extractDescriptions($text) {
    preg_match_all('/\*\*Description\*\*: (.*?)\n/', $text, $matches);
    return $matches[1];
}

// Extract Severities
function extractSeverities($text) {
    preg_match_all('/\*\*Severity\*\*: (.*?)\n/', $text, $matches);
    return $matches[1];
}

// Extract Solutions
function extractSolutions($text) {
    preg_match_all('/\*\*Solution\*\*: (.*?)\n/', $text, $matches);
    return $matches[1];
}

// Extract Attack Vector
function extractAttackVector($text) {
    preg_match_all('/\*\*Attack Vector\*\*: (.*?)\n/', $text, $matches);
    return $matches[1];
}

function extractVulnerabilities($text) {
    $results = [];

    

    // Extract CVEs
    preg_match_all('/CVE-\d{4}-\d{4,7}/i', $text, $matches);
    $results = array_merge($results, array_values(array_unique($matches[0])));

    // Extract CWEs
    preg_match_all('/CWE-\d{1,5}/i', $text, $matches);
    $results = array_merge($results, array_values(array_unique($matches[0])));
    // Extract Named Vulnerabilities (excluding CVE/CWE)
    preg_match_all('/\d{1,2}. \*\*(.*?)\*\*/', $text, $matches);
    for ($i = 0; $i < count($matches[1]); $i++) {
        $name = $matches[1][$i];
        if (!preg_match('/CVE|CWE/i', $name)) {
            $results[] = $name;
        }
    }

    return $results;
}


// Extract CVEs, severities, descriptions, and solutions from $output3
$Vulnerabilities = extractVulnerabilities($output3);
$links = extractLinks($output3);
$severities = extractSeverities($output3);
$descriptions = extractDescriptions($output3);
$solutions = extractSolutions($output3);
$attackVectors = extractAttackVector($output3);
$exploitabilities = [];

$urlModel = 'http://192.168.1.13:8888/predict';

foreach ($descriptions as $index => $description) {
    // Make sure we have corresponding entries in all arrays
    if (!isset($severities[$index]) || !isset($attackVectors[$index])) {
        $exploitabilities[$index] = "Missing corresponding data";
        continue;
    }
    
    $attackVectors[$index]=trim((string)$attackVectors[$index]);
    $severities[$index]=trim((string)$severities[$index]);
    // var_dump($severities[$index]);
    // var_dump($attackVectors[$index]);


    $data = json_encode([
        'description' => (string)$description,
        'baseSeverity' => (string)$severities[$index],
        'attackVector' => (string)$attackVectors[$index]
    ]);

   
    $options = [
        'http' => [
            'method' => 'POST',
            'header' => [
                'X-API-KEY: ' . $apiKey,
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data)
            ],
            'content' => $data
        ]
    ];

    $context = stream_context_create($options);
    $response = file_get_contents($urlModel, false, $context);

    if ($response === FALSE) {
        // Get more detailed error info
    $error = error_get_last();
    $exploitabilities[$index] = "API request failed: " . $error['message'];
        continue;
    }

    $result = json_decode($response, true);
      
    $exploitabilities[$index] = $result['Exploitability'] ?? "Unknown response";
}

// echo "<h3>Sequential execution Time:</h3>";
// echo "<pre>";
// echo number_format($executionSeq_time, 6) . " seconds";
// echo "</pre>";

// foreach ($results as $result) {
//     echo "Tool: " . htmlspecialchars($result['tool']) . " - Time: " . number_format($result['time'], 6) . " seconds\n";
// }

// echo "<h3>Parallel execution Time:</h3>";
// echo "<pre>";
// echo number_format($executionPar_time, 6) . " seconds";
// echo "</pre>";

    // Debugging: Print variables
    // echo "<h2>Debugging Output</h2>";
    // echo "<h3>\$output3:</h3>";
    // echo "<pre>";
    // print_r($output3);
    // echo "</pre>";

    // echo "<h3>\$Vulnerabilities:</h3>";
    // echo "<pre>";
    // print_r($Vulnerabilities);
    // echo "</pre>";

    // echo "<h3>\$severities:</h3>";
    // echo "<pre>";
    // print_r($severities);
    // echo "</pre>";

    // echo "<h3>\$descriptions:</h3>";
    // echo "<pre>";
    // print_r($descriptions);
    // echo "</pre>";

    // echo "<h3>\$solutions:</h3>";
    // echo "<pre>";
    // print_r($solutions);
    // echo "</pre>";


    // echo "<h3>\$AttackVector:</h3>";
    // echo "<pre>";
    // print_r($attackVectors);
    // echo "</pre>";

    
    // echo "<h3>\$exploitabilities:</h3>";
    // echo "<pre>";
    // print_r($exploitabilities);
    // echo "</pre>";

  
  

    
// Display the output in an HTML table
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Script Output</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 90%;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            table-layout: fixed;
            word-wrap: break-word;
        }
        th, td {
            padding: 5px; /* Reduced padding for more compact rows */
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        a {
            color: #3498db;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Final Report</h1>
        <p><a href="<?php echo htmlspecialchars($url, ENT_QUOTES, 'UTF-8'); ?>" target="_blank">
            <?php echo htmlspecialchars($url, ENT_QUOTES, 'UTF-8'); ?>
        </a></p>

        <?php if (!empty($Vulnerabilities)): ?>
            <table>
                <thead>
    <tr>
        <th>Vulnerabilities</th>
        <th>Severity</th>
        <th>Description</th>
        <th>Solution</th>
        <th>Exploitability</th>
        <th>Attack Vector</th>
    </tr>
</thead>
<tbody>
    <?php foreach ($Vulnerabilities as $key => $value): ?>
        <tr>
            <td>
                <a href="<?php echo isset($links[$key]) ? htmlspecialchars($links[$key]) : 'https://www.google.com'; ?>" target="_blank">
                    <?php echo htmlspecialchars($value); ?>
                </a>
            </td>
            <td><?php echo isset($severities[$key]) ? htmlspecialchars($severities[$key]) : 'Unknown'; ?></td>
            <td><?php echo isset($descriptions[$key]) ? htmlspecialchars($descriptions[$key]) : 'No description available'; ?></td>
            <td><?php echo isset($solutions[$key]) ? htmlspecialchars($solutions[$key]) : 'No solution available'; ?></td>
            <td><?php echo isset($exploitabilities[$key]) ? htmlspecialchars($exploitabilities[$key]) : 'Unknown'; ?></td>
            <td><?php echo isset($attackVectors[$key]) ? htmlspecialchars($attackVectors[$key]) : 'Unknown'; ?></td>
        </tr>
    <?php endforeach; ?>
</tbody>


            </table>
        <?php else: ?>
            <p>No CVEs found in the report.</p>
               <?php 
                            //$output4 = shell_exec("bash clear.sh ");
                            ?>
        <?php endif; ?>
    </div>
</body>
</html>

