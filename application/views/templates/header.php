<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/b91f07c834.js" crossorigin="anonymous"></script>
    <style>
        .nabil-bg {
            background-color: #3468C0;
        }
        .photo {
            background-image: url(<?= base_url('assets') ?>/img/<?= $photo ?>);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: top;
            height: 100px; 
            width: 100px; 
            border-radius: 50%;
        }
        .nabil-btn {
            background-color: #215dc4;
            transition: .3s;
        }
        .nabil-btn:hover {
            background-color: #1756c2;
            letter-spacing: 1.5px;
        }

        .nabil2-btn {
            color: #000;
            border: 2px solid #9cb7e5;
            background-color: transparent;
            transition: .3s;
        }
        .nabil2-btn:hover {
            background-color: #9cb7e5;
        }

        .form-wrapper-create label {
            margin-left: 8px;
        }
        .form-wrapper-create input,.form-wrapper-create select {
            border:1px solid black ;
            border-radius: 25px;
            height: 30px;
            padding: 2px 10px;
        }

        table {
            font-size: .8rem;
        }
        textarea, input, select {
            border-radius: 10px;
            border: 1px solid black;
        }
    </style>
  </head>
  <body>
    <div class="container-fluid">