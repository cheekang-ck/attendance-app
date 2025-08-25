# Use official PHP + Apache image from Docker Hub
FROM php:8.2-apache

# Copy your project into Apache's web root
COPY . /var/www/html/

