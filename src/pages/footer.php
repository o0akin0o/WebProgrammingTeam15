</main>
    <footer>
    
    <style>
        .socialicon
        {
            width: 30px;
            height: auto;
        }
        social-icons {
            list-style: none;
            padding: 0;
            margin: 15px;
            float: left;
        }
        footer {
            padding-left: 70px;
            padding-top: 10px;
            background-color: #4E7047;
            color: white;
            }
        .social-icons li {
            display: inline-block;
            margin-right: 20px; /* Adjust the spacing between icons */
        }
    </style>
    <div class="row my-4 mt-4">
                <div class="col-md-4">
                    <ul class="social-icons">
                        <li>
                            <a href="https://www.facebook.com/" target="_blank" title="Visit our Facebook page">
                                <img class="socialicon" src="./img/fbicon.png" alt="Facebook Icon">
                            </a>
                        </li>
                        <li>
                            <a href="https://www.youtube.com/" target="_blank" title="Visit our youtube chanel">
                                <img class="socialicon" src="./img/youtubeicon.png" alt="Youtube Icon">
                            </a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/" target="_blank" title="Visit our instagram page">
                                <img class="socialicon" src="./img/Instagram_icon.png" alt="Instagram Icon">
                            </a>
                        </li>
                        <li>
                        <?php
                            $filePath = __FILE__;
                            $filename = basename($filePath);
                            $lastModifiedTime = filemtime($filePath);
                            $formattedDateTime = date("F j, Y H:i:s", $lastModifiedTime);
                            echo "<p>Last modified: $formattedDateTime</p>";
                            ?>
                        </li>
                        <!-- Add more social icons as needed -->
                    </ul>
                </div>
                <div class="col-md-4">
                    <p>Opening Hours</p>
                    <span>Sunday-Friday</span>
                    <p>9AM - 9PM</p>

                </div>
                <div class="col-md-4">
                    <p>Address:</p>
                    <span>123 Lesmurine, 13100</span>
                    <p>Phone: 514-123-4567</p>
                </div>
            </div>
    </footer>
</body>
</html>