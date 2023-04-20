<!DOCTYPE html>

<html dir="rtl">

<head>

    @include('web.layouts.style')

</head>

<body class="no-trans">

    <div class="loading">
        <div class="loader text-center">
            <img src="images/main/logo.png" alt="logo">

            <div class="loader-dots">
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
            </div>
            <div class="loader-text">loading ...</div>
        </div>

    </div>

    <div data-scroll-container>

        @include('web.layouts.sidebar')

        <div data-scroll-section>

            @include('web.layouts.nav')
