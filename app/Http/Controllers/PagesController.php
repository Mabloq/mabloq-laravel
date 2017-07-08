<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use App\Category;
use Mail;
use Session;


class PagesController extends Controller {
	public function getIndex() {
		$posts = Post::orderBy('created_at', 'desc')->paginate(4);
		$tags = Tag::all();
		$categories = Category::all();

		return view('pages.welcome')->withPosts($posts)->withTags($tags)->withCategories($categories);

	}

	public function getAbout() {

		return view("pages.aboutme");
	}

	public function getMap() {
		return view('portviews.restaurants');
	}


	// ========================== GET CONTACT ===================================
	public function getContact() {
				return view("pages.contact");
	}

	public function postContact(Request $request) {
		$this->validate($request, [
			'name' => 'required|min:3',
			'email' => 'required|email',
			'subject' => 'required',
			'message' => 'required|min:10'
			]);

			$data = array(
				'name' => $request->name,
				'email' => $request->email,
				'subject' => $request->subject,
				'bodyMessage' => $request->message
			);

		Mail::send('emails.contact', $data, function($message) use ($data){
			$message->from($data['email']);
			$message->to('marcila@ramapo.edu');
			$message->subject($data['subject']);
		});

		Session::flash('success', 'Your Email was Sent!');
		return redirect('/');
	}
}
