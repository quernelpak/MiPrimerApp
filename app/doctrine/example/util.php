<?php

/*
 * The MIT License
 *
 * Copyright (c) 2010 Johannes Mueller <circus2(at)web.de>
 * Copyright (c) 2012 Toha <tohenk@yahoo.com>
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

function autoload()
{
    $libDir = __DIR__.'/../lib';
    require_once($libDir.'/MwbExporter/SplClassLoader.php');

    $classLoader = new SplClassLoader();
    $classLoader->setIncludePath($libDir);
    $classLoader->register();

    return $classLoader;
}

function output($document, $time)
{
    if ($document) {
        echo sprintf("<h1>%s</h1>\n", $document->getFormatter()->getTitle());

        // show some information
        echo "<h2>Information:</h2>\n";
        echo "<ul>\n";
        echo sprintf("<li>Filename: %s</li>\n", basename($document->getWriter()->getStorage()->getResult()));
        echo sprintf("<li>Memory usage: %0.3f MB</li>\n", (memory_get_peak_usage(true) / 1024 / 1024));
        echo sprintf("<li>Time: %0.3f second(s)</li>\n", $time);
        echo "</ul>\n";

        // show a simple text box with the output
        echo "<h2>Result:</h2>\n";
        echo "<textarea cols=\"100\" rows=\"50\">\n";
        echo $document->getWriter()->getStorage()->getLogs()."\n";
        echo "</textarea>\n";
    } else {
        echo "<p>Export not performed, please review your code.</p>\n";
    }
}