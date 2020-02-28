<?php
/**
 * Created by engineer
 * User: POL
 * Date: 7/31/2018
 * Time: 9:42 AM
 */
    switch ($option){

        case md5('Manage Users'):
            include 'manageusers/platform.php';
            break;
        case md5('Manage Departments'):
            include 'managedepartments/platform.php';
            break;
        case md5('Manage Drivers'):
            include 'managedrivers/platform.php';
            break;
        case md5('Manage Unitco'):
            include 'manageunitco/platform.php';
            break;

        case md5('Manage Fleet'):
            include 'managefleet/platform.php';
            break;
    }