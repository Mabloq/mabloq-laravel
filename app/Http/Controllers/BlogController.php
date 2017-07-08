<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use App\Tag;
use App\PostTag;

class BlogController extends Controller
{
	public function getIndex() {
		$posts = Post::paginate(4);
		$categories = Category::all();
		$tags = Tag::all();
		return view('blog.index')->withPosts($posts)->withCategories($categories)->withTags($tags);
	}
  public function getSingle($slug) {
		$post = Post::where('slug', '=', $slug)->first();


		return view('blog.single')->withPost($post);
	}


	public function getCategory($category) {

		$posts = Post::where('category_id', '=', $category)->paginate(4);
		$category = Category::find($category);
		$categories = Category::all();
		$tags = Tag::all();

		return view('blog.category')->withPosts($posts)->withCategory($category)->withTags($tags)->withCategories($categories);
	}

//Show all blo gposts associated with a tag
	public function getTag($tag) {
		//retrieve a collection of posts_id from PostTag table

		//retrieve the actauly posts associated with the collected post_id's
		$posts =DB::table('posts')
            ->join('post_tag', 'posts.id', '=', 'post_tag.post_id')
						->where('post_tag.tag_id', '=', $tag)
            ->select('posts.*')
            ->paginate(4);


		$tag2 = Tag::find($tag);


		return view('blog.tag')->withPosts($posts)->withTag($tag2);

	}


}
