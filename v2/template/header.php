<?php
require ("admin/includes/checksouthead.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Responsive App</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
  <style>
    body {
      display: flex;
      flex-direction: column;
      min-height: 100vh;
      margin: auto;
      max-width: 780px;
    }
    
    .app-content {
      flex-grow: 1;
      overflow-y: auto;
      overflow-x: hidden;
      padding: 10px;
      padding-top: 80px;
      padding-bottom: 50px;
    }
    
    .app-header {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      z-index: 1000;
    }
    
    .app-footer {
      position: fixed;
      bottom: 0;
      left: 0;
      width: 100%;
      background-color:rgb(81, 213, 246);
      color: #fff;
      padding: 10px 0;
      display: flex;
      justify-content: space-around;
      align-items: center;
    }
    
    .app-footer button {
      background-color: transparent;
      border: none;
      color: #fff;
      font-size: 1.2rem;
      cursor: pointer;
      padding: 10px 20px;
      transition: transform 0.3s ease;
    }
    
    .app-footer button:hover {
      transform: translateY(-5px);
    }
    
    .banner-slider .swiper-slide {
      height: 200px;
      background-size: cover;
      background-position: center;
    }
    
    .category-slider, .brand-slider {
      overflow-x: auto;
      white-space: nowrap;
      padding-bottom: 10px;
    }
    
    .category-slider .swiper-slide,
    .brand-slider .swiper-slide {
      display: inline-block;
      width: auto;
      padding: 10px 20px;
      background-color: #f5f5f5;
      border-radius: 20px;
      margin-right: 20px;
    }
    
    .product-card {
      border: 1px solid #ddd;
      border-radius: 8px;
      overflow: hidden;
    }
    
    .product-card img {
      width: 100%;
      height: 150px;
      object-fit: cover;
    }
  </style>
</head>
<body>
  <header class="app-header bg-primary text-white py-3">
    <div class="container d-flex justify-content-between align-items-center">
      <h1 class="mb-0">COEO</h1>
      <div class="d-flex align-items-center">
        <i class="bi bi-bell-fill fs-4 me-3"></i>
        <img src="https://via.placeholder.com/40" alt="User Avatar" class="rounded-circle">
      </div>
    </div>
  </header>

  <main class="app-content">