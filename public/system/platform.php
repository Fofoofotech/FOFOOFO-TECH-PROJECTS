<?php
/**
 * Created by engineer
 * User: POL
 * Date: 7/31/2018
 * Time: 9:42 AM
 *
 * 
 */


    switch ($option){


        case md5('Assign Vehicles');
            include 'assignvehicles/platform.php';
            break;



        case md5('Fuel Request'):
            include 'fuelrequest/platform.php';
            break;

        case md5('Manage Drivers'):
            include 'managedrivers/platform.php';
            break;


    }