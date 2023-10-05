<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased blue-bg min-h-screen ">
<div id="blob"></div>
<div id="blur"></div>
</body>
<style>
    @keyframes rotate {
        from {
            transform: rotate(0deg);
        }
        50% {
            scale: 1 1.5;
        }
        to {
            transform: rotate(360deg);
        }
    }
    #blob {
        background: linear-gradient(
        to right,
        aquamarine,
        mediumpurple
        );
        height: 200px;
        aspect-ratio: 1;
        position: absolute;
        border-radius: 50%;
        left: 50%;
        top: 50%;
        translate: -50% -50%;
        animation: rotate 10s infinite;
        z-index:1;

    }

    #blur {
        height: 100%;
        width: 100%;
        position: absolute;
        z-index: 2;
        backdrop-filter: blur(50px);
    }
</style>
<script>
 const blob = document.getElementById('blob');

 document.body.onpointermove = event => {
        const { clientX, clientY } = event;

        //for direct response to mouse movement
        // blob.style.left = `${clientX}px`;
        // blob.style.top = `${clientY}px`;

        //for animated response to mouse movement
        blob.animate({
                left: `${clientX}px`,
                top: `${clientY}px`
            }, {
            duration: 1000,
            iterations: 1,
            fill: 'forwards'
        })
 }

 document.body.onpointerleave = event => {
        blob.animate({
            height: '0px'
        },{
            duration: 500,
            iterations: 1,
            fill: 'forwards'
        })
 }
 document.body.onpointerenter = event => {
        blob.animate({
            height: '200px'
        },{
            duration: 500,
            iterations: 1,
            fill: 'forwards'
        })
 }
</script>
</html>
