@extends('layout.main')
            @section('main_content')
            <div class="container m-auto">

                <div class="flex justify-between items-baseline lg:mr-8  uk-visible@s">
                    <h1 class="font-extrabold leading-none mb-6 lg:text-2xl text-lg text-gray-900 tracking-tight"> Stories </h1>
                </div>

                <!-- users-->

                <div class="relative uk-visible@s" uk-slider="finite: true">

                    <a class="-left-2 absolute bg-white bottom-1/2 flex items-center justify-center p-2 rounded-full shadow text-xl w-9 z-10 dark:bg-gray-800 dark:text-white"
                        href="#" uk-slider-item="previous"> <i class="icon-feather-chevron-left"></i> </a>
                    <a class="absolute bg-white bottom-1/2 flex items-center justify-center p-2 right-4 rounded-full shadow text-xl w-9 z-10 dark:bg-gray-800 dark:text-white"
                        href="#" uk-slider-item="next"> <i class="icon-feather-chevron-right"></i></a>

                    <div class="uk-slider-container pb-3 lg:mr-3">
                        <ul class="uk-slider-items uk-grid uk-grid-small">

                            <li>
                                <div
                                    class="relative bg-gradient-to-tr from-yellow-600 to-pink-600 p-1 rounded-full transform -rotate-2 hover:rotate-3 transition hover:scale-105 m-1">
                                    <img src="{{ asset('assets/images/avatars/avatar-2.jpg') }}"
                                        class="w-20 h-20 rounded-full border-2 border-white bg-gray-200">
                                    <a href="#"
                                        class=" bg-gray-400 p-2 rounded-full w-8 h-8 flex justify-center items-center text-white border-4 border-white absolute right-2 bottom-0 bg-blue-600">
                                        + </a>
                                </div>
                                <a href="profile.html" class="block font-medium text-center text-gray-500 text-x truncate w-24">
                                    You </a>
                            </li>
                            <li>
                                <a href="#story-view" uk-toggle>
                                    <div
                                        class="bg-gradient-to-tr from-yellow-600 to-pink-600 p-1 rounded-full transform -rotate-2 hover:rotate-3 transition hover:scale-105 m-1">
                                        <img src="{{ asset('assets/images/avatars/avatar-1.jpg') }}"
                                            class="w-20 h-20 rounded-full border-2 border-white bg-gray-200">
                                    </div>
                                </a>
                                <a href="profile.html" class="block font-medium text-center text-gray-500 text-x truncate w-24">
                                    Dennis </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="lg:flex justify-center lg:space-x-10 lg:space-y-0 space-y-5">

                    <!-- left sidebar-->
                    <div class="space-y-5 flex-shrink-0 lg:w-7/12">

                        <!-- post -->
                        @foreach (Auth::user()->postings() as $post)
                        <div class="bg-white shadow rounded-md dark:bg-gray-900 -mx-2 lg:mx-0">
                            <!-- post header-->
                            <div class="flex justify-between items-center px-4 py-3">
                                <div class="flex flex-1 items-center space-x-4">
                                    <a href="#">
                                        <div class="bg-gradient-to-tr from-yellow-600 to-pink-600 p-0.5 rounded-full">  
                                            <img src="{{ asset('assets/images/avatars/avatar-2.jpg') }}" class="bg-gray-200 border border-white rounded-full w-8 h-8">
                                        </div>
                                    </a>
                                    <span class="block capitalize font-semibold dark:text-gray-100">{{$post->user->name}}</span>
                                </div>
                              <div>
                                <a href="#"> <i class="icon-feather-more-horizontal text-2xl hover:bg-gray-200 rounded-full p-2 transition -mr-1 dark:hover:bg-gray-700"></i> </a>
                                <div class="bg-white w-56 shadow-md mx-auto p-2 mt-12 rounded-md text-gray-500 hidden text-base border border-gray-100 dark:bg-gray-900 dark:text-gray-100 dark:border-gray-700" uk-drop="mode: hover;pos: top-right">
                              
                                    <ul class="space-y-1">
                                      <li> 
                                          <a href="#" class="flex items-center px-3 py-2 hover:bg-gray-200 hover:text-gray-800 rounded-md dark:hover:bg-gray-800">
                                           <i class="uil-share-alt mr-1"></i> Share
                                          </a> 
                                      </li>
                                      <li> 
                                          <a href="/posting/{{$post->id}}/edit" class="flex items-center px-3 py-2 hover:bg-gray-200 hover:text-gray-800 rounded-md dark:hover:bg-gray-800">
                                           <i class="uil-edit-alt mr-1"></i>  Edit Post 
                                          </a> 
                                      </li>
                                      <li> 
                                          <a href="#" class="flex items-center px-3 py-2 hover:bg-gray-200 hover:text-gray-800 rounded-md dark:hover:bg-gray-800">
                                           <i class="uil-comment-slash mr-1"></i>   Disable comments
                                          </a> 
                                      </li> 
                                      <li> 
                                          <a href="#" class="flex items-center px-3 py-2 hover:bg-gray-200 hover:text-gray-800 rounded-md dark:hover:bg-gray-800">
                                           <i class="uil-favorite mr-1"></i>  Add favorites 
                                          </a> 
                                      </li>
                                      <li>
                                        <hr class="-mx-2 my-2 dark:border-gray-800">
                                      </li>
                                      <li> 
                                        <form action="/posting/{{$post->id}}" method="post" class="d-inline" enctype="multipart/form-data">
                                            @method('delete')
                                            @csrf
                                            <button class="flex items-center px-3 py-2 text-red-500 hover:bg-red-100 hover:text-red-500 rounded-md dark:hover:bg-red-600" onclick="return confirm('Are you sure?')"><i class="uil-trash-alt mr-1"></i>  Delete</button>
                                            </form>
                                      </li>
                                    </ul>
                                
                                </div>
                              </div>
                            </div>
    
                            <div uk-lightbox>
                                @if ($post->video == null)
                                @else
                                  <video controls="controls" preload="metadata">
                                    <source src="{{asset('storage/'. $post->video)}}" type="video/mp4">
                                </video>
                               @endif
                               @if ($post->image == null)
                               
                               @else
                                <a href="{{ asset('assets/images/post/img4.jpg') }}">  
                                    <img src="{{asset('storage/'. $post->image)}}" class="card-img-top" alt="">
                                </a>
                               @endif
                            </div>
                            
                            <div class="py-3 px-4 space-y-3"> 
                                <div id="post{{$post->id}}">
                                <div class="flex space-x-4 lg:font-bold">
                                    <style>
                                        .uil-thumbs-up:hover{
                                            cursor: pointer;
                                        }
                                        .uil-thumbs-up{
                                            margin-top: 10px;
                                        }
                                        .down {
                                            margin-top: 9px;
                                        }
                                    </style>
                                    <form>
                                        @csrf
                                        <input type="hidden" name="username" value="{{auth()->user()->name}}">
                                        <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                                        <input type="hidden" name="post_id" value="{{$post->id}}">
                                        <input type="hidden" name="value" value="1">
                                        @if ($post->like->whereIn('user_id', auth()->user()->id)->count() == 0)
                                        <i class="uil-thumbs-up btn-like" id="btn-like"></i>
                                        @else
                                        <i class="uil-thumbs-up btn-like" id="btn-like" style="color: red"></i>
                                        @endif
                                       </form>
                                    <div  class="down">{{$post->like->count()}}</div>
                                    <a href="#comment_add{{$post->id}}" class="flex items-center space-x-2" uk-toggle>
                                        <div class="p-2 rounded-full text-black">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" width="22" height="22" class="dark:text-gray-100">
                                                <path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <div style="margin-left: -3%">{{$post->comments()->count()}} Comment</div>
                                    </a>
                                    <a href="#" class="flex items-center space-x-2 flex-1 justify-end">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" width="22" height="22" class="dark:text-gray-100">
                                            <path d="M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z" />
                                        </svg>
                                        <div> Share</div>
                                    </a>
                                </div>
                                <div class="flex items-center space-x-3"> 
                                      @if ($post->like->count() == 0)

                                      @else
                                      <div class="flex items-center">
                                        <img src="{{ asset('assets/images/avatars/avatar-1.jpg') }}" alt="" class="w-6 h-6 rounded-full border-2 border-white dark:border-gray-900">
                                        <img src="{{ asset('assets/images/avatars/avatar-4.jpg') }}" alt="" class="w-6 h-6 rounded-full border-2 border-white dark:border-gray-900 -ml-2">
                                        <img src="{{ asset('assets/images/avatars/avatar-2.jpg') }}" alt="" class="w-6 h-6 rounded-full border-2 border-white dark:border-gray-900 -ml-2">
                                    </div>
                                    <div class="dark:text-gray-100">
                                      Liked <strong>{{$post->like[0]->username}}</strong>
                                      @if ($post->like->skip(1)->count() == 0)
                                            
                                      @else
                                        and <strong>{{$post->like->skip(1)->count()}}  Others </strong>
                                      @endif
                                    </div>
                                      @endif
                                </div>
                                </div>

                                <div class="keterangan">
                                  @if (strlen($post->keterangan ) <= 40)
                                      <p>{{$post->keterangan}}</p>
                                  @else
                                      <p style="display: inline">{{substr($post->keterangan, 0,40)}}
                                        <span id="{{$post->id}}" style="display:none">{{substr($post->keterangan, 41, null)}}</span></p>
                                        <a href="" onclick="toggleText(this, '{{$post->id}}'); return false;" style="color: rgb(109, 94, 248)">...Read More</a>
                                  @endif
                                    
                                </div>

                                <div class="comment" id="comment_add{{$post->id}}">
                                <div class="border-t pt-4 space-y-4 dark:border-gray-600">
                                    @foreach ($post->comments()->limit(2)->get() as $comment)
                                         <div class="flex">
                                        <div class="w-10 h-10 rounded-full relative flex-shrink-0">
                                            <img src="{{ asset('assets/images/avatars/avatar-1.jpg') }}" alt="" class="absolute h-full rounded-full w-full">
                                        </div>
                                        <div class="text-gray-700 py-2 px-3 rounded-md bg-gray-100 h-full relative lg:ml-5 ml-2 lg:mr-20  dark:bg-gray-800 dark:text-gray-100">
                                            <p class="leading-6">{{$comment->comment}}</p>
                                            <div class="absolute w-3 h-3 top-3 -left-1 bg-gray-100 transform rotate-45 dark:bg-gray-800"></div>
                                        </div>
                                      </div>
                                    @endforeach
                                    <a href="#comment_add{{$post->id}}" uk-toggle>
                                        <p class="mt-2">
                                            Lihat semua komentar
                                        </p>
                                    </a>
                                </div>
                                <style>
                                     .fa-paper-plane:hover{
                                            cursor: pointer;
                                        }
                                </style>
                                <div class="bg-gray-100 bg-gray-100 rounded-full rounded-md relative dark:bg-gray-800">
                                    <form>
                                        @csrf
                                        <input type="hidden" name="post_type" value="{{'App\Posting'}}">
                                        <input type="text" name="comment" placeholder="Add your Comment.." class="bg-transparent max-h-10 shadow-none">
                                        <input type="hidden" name="post_id" value="{{$post->id}}">
                                        <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                                        <div class="absolute bottom-0 flex h-full items-center right-0 right-3 text-xl space-x-2">
                                            <i class="fa-solid fa-paper-plane" id="btn-comment"></i>
                                        </div>
                                       </form>
                                </div>
                            </div>
                            </div>
                        </div>

                        {{-- post_story --}}
                        <div id="comment_add{{$post->id}}" class="uk-modal-container" uk-modal>
                            <div class="uk-modal-dialog story-modal">
                                <button class="uk-modal-close-default lg:-mt-9 lg:-mr-9 -mt-5 -mr-5 shadow-lg bg-white rounded-full p-4 transition dark:bg-gray-600 dark:text-white" type="button" uk-close></button>
                    
                                    <div class="story-modal-media">
                                        <img src="{{asset('assets/images/post/img4.jpg')}}" alt=""  class="inset-0 h-full w-full object-cover">
                                    </div>
                                    <div class="flex-1 bg-white dark:bg-gray-900 dark:text-gray-100" id="hiiii{{ $post->id }}">
                                    
                                        <!-- post header-->
                                        <div class="border-b flex items-center justify-between px-5 py-3 dark:border-gray-600">
                                            <div class="flex flex-1 items-center space-x-4">
                                                <a href="#">
                                                    <div class="bg-gradient-to-tr from-yellow-600 to-pink-600 p-0.5 rounded-full">
                                                        <img src="{{asset('assets/images/avatars/avatar-2.jpg')}}"
                                                            class="bg-gray-200 border border-white rounded-full w-8 h-8">
                                                    </div>
                                                </a>
                                                <span class="block text-lg font-semibold"> {{$post->user->name}} </span>
                                            </div>
                                            <a href="#"> 
                                                <i  class="icon-feather-more-horizontal text-2xl rounded-full p-2 transition -mr-1"></i>
                                            </a>
                                        </div>
                                        <div class="story-content p-4" data-simplebar>
                                            <p> {{$post->keterangan}} </p>
                                            <div class="py-4 ">
                                                <div id="story_post{{$post->id}}">
                                                    <div class="flex space-x-4 lg:font-bold story_post">
                                                        <style>
                                                            .uil-thumbs-up:hover{
                                                                cursor: pointer;
                                                            }
                                                            .uil-thumbs-up{
                                                                margin-top: 10px;
                                                            }
                                                            .down {
                                                                margin-top: 9px;
                                                            }
                                                            .story_post{
                                                                margin-bottom: -12px;
                                                                margin-left: -6%;
                                                            }
                                                            .like_count{
                                                                margin-left: -5px;
                                                            }
                                                        </style>
                                                        <form>
                                                            @csrf
                                                            <input type="hidden" name="username" value="{{auth()->user()->name}}">
                                                            <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                                                            <input type="hidden" name="post_id" value="{{$post->id}}">
                                                            <input type="hidden" name="value" value="1">
                                                            <i class="uil-thumbs-up btn-like" id="btn-story-like"></i>
                                                           </form>
                                                        <div  class="down">{{$post->like->count()}}</div>
                                                            <div class="p-2 rounded-full text-black">
                                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" width="22" height="22" class="dark:text-gray-100">
                                                                    <path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd" />
                                                                </svg>
                                                            </div>
                                                            <div style="margin-left: -1px; margin-top: 8px">{{$post->comments()->count()}} Comment</div>
                                                        <a href="#" class="flex items-center space-x-2 flex-1 justify-end">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" width="22" height="22" class="dark:text-gray-100">
                                                                <path d="M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z" />
                                                            </svg>
                                                            <div> Share</div>
                                                        </a>
                                                    </div>
                                                    <hr class="-mx-4 my-3">
                                                    <div class="flex items-center space-x-3"> 
                                                          @if ($post->like->count() == 0)
                    
                                                          @else
                                                          <div class="flex items-center">
                                                            <img src="{{ asset('assets/images/avatars/avatar-1.jpg') }}" alt="" class="w-6 h-6 rounded-full border-2 border-white dark:border-gray-900">
                                                            <img src="{{ asset('assets/images/avatars/avatar-4.jpg') }}" alt="" class="w-6 h-6 rounded-full border-2 border-white dark:border-gray-900 -ml-2">
                                                            <img src="{{ asset('assets/images/avatars/avatar-2.jpg') }}" alt="" class="w-6 h-6 rounded-full border-2 border-white dark:border-gray-900 -ml-2">
                                                        </div>
                                                        <div class="dark:text-gray-100">
                                                          Liked <strong>{{$post->like[0]->username}}</strong>
                                                          @if ($post->like->skip(1)->count() == 0)
                                                                
                                                          @else
                                                            and <strong>{{$post->like->skip(1)->count()}}  Others </strong>
                                                          @endif
                                                        </div>
                                                          @endif
                                                    </div>
                                                    </div>
                                               
                                            </div>
                    
                                        <div class="-mt-1 space-y-1">
                                            @foreach ($post->comment->whereIn('parent_id', 0) as $comment)
                                                <div class="flex flex-1 items-center space-x-2">
                                                <img src="{{asset('assets/images/avatars/avatar-2.jpg')}}" class="rounded-full w-8 h-8">
                                                <div class="flex-1 p-2">
                                                    <div class="lg:font-bold" style="margin-bottom: -3px">
                                                        {{$users->whereIn('id', $comment->user_id)->first()->name}}
                                                     </div>
                                                   {{$comment->comment}}
                                                </div>
                                            </div>
                                            <div class="flex space-x-3"  style="margin-left: 47px; margin-top: -8px;color: rgb(168, 168, 168);">
                                            <div class="date_up">{{$comment->created_at->longAbsoluteDiffForHumans()}}</div>
                                            <div class="a" style="margin-right: -3%">{{$post->comment->whereIn('parent_id', $comment->id)->count()}}</div>
                                            <div class="balas" onclick="form_comment(this, 'form_comment{{$comment->id}}'); return false;" style="cursor: pointer;"> balas</div>
                                            <div class="suka">14 suka</div>
                                            <div class="like_comment" style="margin-top: -3%"><i class="uil-thumbs-up btn-like"></i></div>
                                            </div>


                                            <div class="coba"  style="margin-left: 14%; display: none" id="form_comment{{$comment->id}}">

                                                @foreach ($post->comment->whereIn('parent_id', $comment->id) as $balas)
                                                <div class="flex flex-1 items-center space-x-2" style="margin-bottom: 1rem; margin-top: -1rem;margin-left: 3rem">
                                                    <img src="{{asset('assets/images/avatars/avatar-2.jpg')}}" class="rounded-full w-8 h-8">
                                                    <div class="flex-1 p-2">
                                                        <div class="lg:font-bold" style="margin-bottom: -3px">
                                                           {{$users->whereIn('id', $balas->user_id)->first()->name}}
                                                         </div>
                                                       {{$balas->comment}}
                                                    </div>
                                                </div>
                                                @endforeach
                                                
                                                <div class="bg-gray-100 dark:bg-gray-100 rounded-full rounded-md relative w-56"  style="margin-left: 14%; margin-top: -1rem; margin-bottom: 3%">
                                                        <form>
                                                            @csrf
                                                            <input type="hidden" name="story_replay" value="hiiii{{ $post->id }}">
                                                            <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                                                            <input type="hidden" name="post_type" value="{{'App\Posting'}}">
                                                            <input type="text" name="comment" placeholder="Balas your Comment.." class="bg-transparent max-h-10 shadow-none">
                                                            <input type="hidden" name="post_id" value="{{$post->id}}">
                                                            <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                                                            <div class="absolute bottom-0 flex h-full items-center right-0 right-3 text-xl space-x-2">
                                                                <i class="fa-solid fa-paper-plane" id="balas-comment"></i>
                                                            </div>
                                                           </form>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                        </div>
                                        <div class="p-3 border-t dark:border-gray-600">
                                            <div class="bg-gray-200 dark:bg-gray-700 rounded-full rounded-md relative">
                                                    <form>
                                                        @csrf
                                                        <input type="hidden" name="story_replay" value="hiiii{{ $post->id }}">
                                                        <input type="hidden" name="post_type" value="{{'App\Posting'}}">
                                                        <input type="text" name="comment" placeholder="Add your Comment.." class="bg-transparent max-h-10 shadow-none">
                                                        <input type="hidden" name="post_id" value="{{$post->id}}">
                                                        <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                                                        <div class="absolute bottom-0 flex h-full items-center right-0 right-3 text-xl space-x-2">
                                                            <i class="fa-solid fa-paper-plane" id="show-comment"></i>
                                                        </div>
                                                       </form>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        
                        {{-- end_post_story --}}

                        @endforeach
                    </div>

                    <!-- right sidebar-->
                    <div class="lg:w-5/12">

                        <div class="bg-white dark:bg-gray-900 shadow-md rounded-md overflow-hidden">

                            <div class="bg-gray-50 dark:bg-gray-800 border-b border-gray-100 flex items-baseline justify-between py-4 px-6 dark:border-gray-800">
                                <h2 class="font-semibold text-lg">Who to follow</h2>
                            </div>
                            @foreach ($users->whereNotIn('id',  Auth::user()->follows()->get()->pluck('id'))->whereNotIn('id', auth()->user()->id) as $user)
                                <div class="divide-gray-300 divide-gray-50 divide-opacity-50 divide-y px-4 dark:divide-gray-800 dark:text-gray-100">
                                <div class="flex items-center justify-between py-3">
                                    <div class="flex flex-1 items-center space-x-4">
                                        <a href="profile.html">
                                            <img src="{{ asset('assets/images/avatars/avatar-2.jpg') }}" class="bg-gray-200 rounded-full w-10 h-10">
                                        </a>
                                        <div class="flex flex-col">
                                            <span class="block capitalize font-semibold">{{$user->name}}</span>
                                        </div>
                                    </div>
                                    <form action="{{{ route('following.store', $user) }}}" method="POST">
                                        @csrf
                                        <button type="submit" class="mt-2">
                                            @if (Auth::user()->follows()->where('following_user_id', $user->id)->first())
                                                 <span class="bg-gray-300 shadow-sm p-2 px-6 rounded-md dark:bg-gray-700"> Unfollow</span> 
                                            @else
                                                <span class="bg-gray-300 shadow-sm p-2 px-6 rounded-md dark:bg-gray-700"> Follow</span>     
                                            @endif
                                           
                                        </button>
                                       </form>
                                </div>
                            </div> 
                        @endforeach
                        </div>

                        <div class="mt-5">
                            <div class="bg-white dark:bg-gray-900 shadow-md rounded-md overflow-hidden">

                                <div class="bg-gray-50 border-b border-gray-100 flex items-baseline justify-between py-4 px-6 dark:bg-gray-800 dark:border-gray-700">
                                    <h2 class="font-semibold text-lg">Latest</h2>
                                    <a href="explore.html"> See all</a>
                                </div>
    
                                <div class="grid grid-cols-2 gap-2 p-3 uk-link-reset">
    
                                    <div class="bg-red-500 max-w-full h-32 rounded-lg relative overflow-hidden uk-transition-toggle"> 
                                        <a href="#story-modal" uk-toggle>
                                            <img src="{{ asset('assets/images/post/img2.jpg') }}" class="w-full h-full absolute object-cover inset-0">
                                        </a>
                                        <div class="flex flex-1 justify-around items-center absolute bottom-0 w-full p-2 text-white custom-overly1 uk-transition-slide-bottom-medium">   
                                            <a href="#"> <i class="uil-heart"></i> 150 </a>
                                            <a href="#"> <i class="uil-heart"></i> 30 </a>
                                        </div>
                                    </div>
                                    
                                    <div class="bg-red-500 max-w-full h-40 rounded-lg relative overflow-hidden uk-transition-toggle"> 
                                        <a href="#story-modal" uk-toggle>
                                            <img src={{ asset('assets/images/post/img7.jpg') }} class="w-full h-full absolute object-cover inset-0">
                                        </a>
                                        <div class="flex flex-1 justify-around items-center absolute bottom-0 w-full p-2 text-white custom-overly1 uk-transition-slide-bottom-medium">   
                                            <a href="#"> <i class="uil-heart"></i> 150 </a>
                                            <a href="#"> <i class="uil-heart"></i> 30 </a>
                                        </div>
                                    </div>                             
                                    
                                    <div class="bg-red-500 max-w-full h-40 -mt-8 rounded-lg relative overflow-hidden uk-transition-toggle"> 
                                        <a href="#story-modal" uk-toggle>
                                            <img src="{{ asset('assets/images/post/img5.jpg') }}" class="w-full h-full absolute object-cover inset-0">
                                        </a>
                                        <div class="flex flex-1 justify-around  items-center absolute bottom-0 w-full p-2 text-white custom-overly1 uk-transition-slide-bottom-medium">   
                                            <a href="#"> <i class="uil-heart"></i> 150 </a>
                                            <a href="#"> <i class="uil-heart"></i> 30 </a>
                                        </div>
                                    </div>
    
                                    <div class="bg-red-500 max-w-full h-32 rounded-lg relative overflow-hidden uk-transition-toggle"> 
                                        <a href="#story-modal" uk-toggle>
                                            <img src="{{ asset('assets/images/post/img3.jpg') }}" class="w-full h-full absolute object-cover inset-0">
                                        </a>
                                        <div class="flex flex-1 justify-around  items-center absolute bottom-0 w-full p-2 text-white custom-overly1 uk-transition-slide-bottom-medium">   
                                            <a href="#"> <i class="uil-heart"></i> 150 </a>
                                            <a href="#"> <i class="uil-heart"></i> 30 </a>
                                        </div>
                                    </div>
    
                                </div>
    
                            </div>
                        </div>

                    </div>
                </div> 
            </div>
        
            <script>
                $(document).on("click", "#btn-like", function(e){
                         const value = e.target.previousElementSibling.getAttribute('value');
                         const post_id = e.target.previousElementSibling.previousElementSibling.getAttribute('value');
                         const user_id = e.target.previousElementSibling.previousElementSibling.previousElementSibling.getAttribute('value');
                         const username = e.target.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.getAttribute('value');
                         let url = '{{ route('like.add') }}';
                         let _token = $('input[name="_token"]').val();
                         let cc = e.target.parentElement.parentElement.parentElement.getAttribute('id');
                         let ee = e.target.getAttribute('id');
                         console.log([cc]);
                         $.ajax({
                             url:url,
                             type:"POST",
                             data:{
                                 username:username,
                                 user_id:user_id,
                                 post_id:post_id,
                                 value:value,
                                 _token:_token,
                                 },
                            success:function(response){
                              console.log(response)
                                $("#"+cc).load('/ '+'#'+cc);
                            },
                            sudah:function(response){
                              console.log(response)
                              $("#"+cc).load('/ '+'#'+cc);
                            },
                            error:function(error){
                               console.log(JSON.stringify(error));
                            }  
                         }); 
                         }); 
                 </script>
                 <script>
                     $(document).on("click", "#btn-story-like", function(e){
                         const value = e.target.previousElementSibling.getAttribute('value');
                         const post_id = e.target.previousElementSibling.previousElementSibling.getAttribute('value');
                         const user_id = e.target.previousElementSibling.previousElementSibling.previousElementSibling.getAttribute('value');
                         const username = e.target.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.getAttribute('value');
                         let url = '{{ route('like.add') }}';
                         let _token = $('input[name="_token"]').val();
                         let cc = e.target.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.getAttribute('id');
                         let like = e.target.getAttribute('id');
                         console.log([cc]);
                         $.ajax({
                             url:url,
                             type:"POST",
                             data:{
                                 username:username,
                                 user_id:user_id,
                                 post_id:post_id,
                                 value:value,
                                 _token:_token,
                                 },
                            success:function(response){
                             console.log(response)  
                             $("#"+cc).load('/ '+'#'+cc); 
                            },
                            sudah:function(response){
                              console.log(response)
                              $("#"+cc).load('/ '+'#'+cc);
                            },
                            error:function(error){
                               console.log(JSON.stringify(error));
                            }  
                         });   
                         }); 
                 </script>
            <script type="text/javascript">
                function toggleText(btn, id){
                        console.log([btn, id]);
                        var e = document.getElementById(id);
                        if(e.style.display == 'inline'){
                            e.style.display = 'none';
                            btn.innerHTML = "...Read More";
                        }else{
                            e.style.display = 'inline';
                            btn.innerHTML = "Show Less";
                        }
                    }
                    
            </script>
             <script type="text/javascript">
                function form_comment(btn, id){
                        console.log([btn, id]);
                        var e = document.getElementById(id);
                        if(e.style.display == 'inline'){
                            e.style.display = 'none';
                            btn.innerHTML = "balas";
                        }else{
                            e.style.background = "red";
                            e.style.display = 'inline';
                            btn.innerHTML = "balas";
                        }
                    }
                    
            </script>
            <script>
                $(document).on("click", "#btn-comment", function(a){
                        const user_id = a.target.parentElement.parentElement.previousElementSibling.value;
                        const post_id = a.target.parentElement.parentElement.previousElementSibling.previousElementSibling.value;
                        const comment = a.target.parentElement.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.value;
                        const post_type = a.target.parentElement.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.value;
                        let url = '{{ route('comment.add') }}';
                        let _token = $('input[name="_token"]').val();
                        let cc = a.target.parentElement.parentElement.parentElement.parentElement.parentElement.getAttribute('id');
                        console.log([cc]);
                        $.ajax({
                            url:url,
                            type:"POST",
                            data:{
                                user_id:user_id,
                                post_id:post_id,
                                comment:comment,
                                post_type: post_type,
                                _token:_token,
                                },
                            success:function(response){
                            console.log(response) 
                            $("#"+cc).load('/ '+'#'+cc);  
                            },
                            error:function(error){
                            console.log(JSON.stringify(error));
                            }  
                        });   
                        }); 
            </script>
             <script>
                $(document).on("click", "#show-comment", function(a){
                        const user_id = a.target.parentElement.parentElement.previousElementSibling.value;
                        const post_id = a.target.parentElement.parentElement.previousElementSibling.previousElementSibling.value;
                        const comment = a.target.parentElement.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.value;
                        const post_type = a.target.parentElement.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.value;
                        const cc = a.target.parentElement.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.value;
                        let url = '{{ route('comment.add') }}';
                        let _token = $('input[name="_token"]').val();
                        console.log([cc]);
                        $.ajax({
                            url:url,
                            type:"POST",
                            data:{
                                user_id:user_id,
                                post_id:post_id,
                                comment:comment,
                                post_type: post_type,
                                _token:_token,
                                },
                            success:function(response){
                            console.log(response)  
                            $("#"+cc).load('/ '+'#'+cc);  
                            },
                            sudah:function(response){
                            console.log(response)
                            $("#"+cc).load('/ '+'#'+cc);
                            },
                            error:function(error){
                            console.log(JSON.stringify(error));
                            }  
                        });   
                        }); 
            </script>
              <script>
                $(document).on("click", "#balas-comment", function(a){
                        const user_id = a.target.parentElement.parentElement.previousElementSibling.getAttribute('value');
                        const post_id = a.target.parentElement.parentElement.previousElementSibling.previousElementSibling.getAttribute('value');
                        const comment = a.target.parentElement.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.value;
                        const post_type = a.target.parentElement.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.getAttribute('value');
                        const comment_id = a.target.parentElement.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.getAttribute('value');
                        const cc = a.target.parentElement.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.getAttribute('value');
                        let url = '{{ route('replyStore.add') }}';
                        let _token = $('input[name="_token"]').val();
                        console.log([user_id,post_id,comment,post_type,cc,comment_id]);
                        $.ajax({
                            url:url,
                            type:"POST",
                            data:{
                                parent_id:comment_id,
                                user_id:user_id,
                                post_id:post_id,
                                comment:comment,
                                post_type: post_type,
                                _token:_token,
                                },
                            success:function(response){
                            console.log(response)  
                            $("#"+cc).load('/ '+'#'+cc);  
                            },
                            sudah:function(response){
                            console.log(response)
                            $("#"+cc).load('/ '+'#'+cc);
                            },
                            error:function(error){
                            console.log(JSON.stringify(error));
                            }  
                        });   
                        }); 
            </script>
            

            @endsection

            