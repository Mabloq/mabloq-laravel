<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Restaurant;
use Storage;

class PortfolioController extends Controller
{
    public function getIndex() {
      $projects = Project::all();

      return view('portfolio.index')->withProjects($projects);
    }

    public function readPortfolio(Request $request) {

      $projDetail = Project::find($request->id);

      return response()->json($projDetail);
    }

    public function getPage($url) {
      $host = 'http://localhost:8000/project/'.$url;
  		$page = Project::where('URL', '=', $host)->first();

      $pageUrl = $page->URL;

  		return view('portviews.'.$url)->withPost($page);
  	}

    public function getxml(){
      $projects = Restaurant::all();
      $xml = new \XMLWriter();
      $xml->openMemory();
      $xml->setIndent(true);
    // Start a new document
      $xml->startDocument();
    // Start a element to put data in
      $xml->startElement('restaurants');
    // Data what goes in your element\
      foreach ($projects as $project) {
        $xml->startElement('restaurant');
        $xml->writeAttribute('id', $project->id);
        $xml->writeAttribute('name', $project->name);
        $xml->writeAttribute('address', $project->address);
        $xml->writeAttribute('lat', $project->lat);
        $xml->writeAttribute('lng', $project->lng);
        $xml->writeAttribute('type', $project->type);
        $xml->endElement();
      }

      $xml->endElement();
      $xml->endDocument();

    // You put the XML content in this variable
    $contents = $xml->outputMemory();
    // Reset XML just in case
    $xml = null;

    Storage::put('restaurants.xml',$contents);
    }
}
