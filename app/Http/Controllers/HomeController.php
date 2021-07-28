<?php

namespace App\Http\Controllers;

use App\Charity;
use App\Contact;
use App\Http\Controllers\Frontend\ActivityController;
use App\Http\Controllers\Frontend\DirectorController;
use App\Http\Controllers\Frontend\MissionController;
use App\Http\Controllers\Frontend\PartnerController;
use App\Http\Controllers\Frontend\StructureController;
use App\Http\Controllers\Frontend\VisionController;
use App\Model\Backend\Activity;
use App\Slide;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function Header(){
        return view('include/test');
    }
    function Footer(){
        return view('include/footer');
    }
    function Index(){
        $partnerDatas = PartnerController::getAllDatas();
        $activityDatas = ActivityController::getAllActivityDatas();
        return view('Auth/index', compact('partnerDatas', 'activityDatas'));
    }
    function Director(){
        $directorData = DirectorController::getDirectorData();
        return view('Auth/director', compact('directorData'));
    }
    function Mission(){
        $missionData = MissionController::getMisionData();
        return view('Auth/mission', compact('missionData'));
    }
    function Vision(){
        $visionData = VisionController::getVisionData();
        return view('Auth/vision', compact('visionData'));
    }
    function Structure(){
        $structureData = StructureController::getStructureData();
        return view('Auth/structure', compact('structureData'));
    }
    function Activity(){
        $activityDatas = ActivityController::getAllActivityDatas();
        return view('Auth/activity', compact('activityDatas'));
    }
    function Page_Detail($id){
        $activityData = Activity::find($id);
        return view('Auth/page-detail', compact('activityData'));

    }
    function Charity(){
        $charityData = Charity::first();
        return view('Auth/charity', compact('charityData'));
    }
    function Contact(){
        $contactData = Contact::first();
        return view('Auth/contact', compact('contactData'));
    }
}
