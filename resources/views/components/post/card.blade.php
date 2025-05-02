<x-card>
    <x-card-body>
        <div class="mb-4">

            <h2 class="h5">
                <a href="{{ route('blog.show', $post->id) }}">
                    {{ $post->title }} {{$loop->iteration}}
                </a>
            </h2>
           <div>

            {{now()->formate('d.m.Y H:i:s')}}
           </div>



        </div>
    </x-card-body>
   </x-card>