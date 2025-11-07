<?php

$regex = '/(?:(?:https?:\/\/)?(?:www\.)?[a-zA-Z0-9\-_]+\.[a-zA-Z]{2,6}(?:\/[a-zA-Z0-9\-\._~:\/?#\[\]@!$&\'()*+,;=]*)?)|(?:[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,})|(?:\b\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}\b)|(?:\b\d{1,2}[\/\-]\d{1,2}[\/\-]\d{2,4}\b)|(?:\+?\d{1,4}[\s\-]?\(?\d{1,4}\)?[\s\-]?\d{1,4}[\s\-]?\d{1,9})|(?:#[a-fA-F0-9]{3,6})|(?:\b(?:foo|bar|baz|qux|quux|corge|grault|garply|waldo|fred|plugh|xyzzy|thud)\b)/';

$sampleText = <<<TEXT
Hello, contact me at david@example.com or visit https://www.example.com/page?query=test.
My IP is 192.168.1.1 and I was born on 12/05/2000.
Call me at +1 (555) 123-4567. Also check color #ff00ff and some words: foo, bar, xyzzy.
TEXT;

preg_match_all($regex, $sampleText, $matches);

echo "Matches found:\n";
print_r($matches[0]);
