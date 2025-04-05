@section('title', $article->translate_name)
@section('icon', 'fas fa-newspaper')

<main>
    @livewire('banner', [
        'title' => $article->translate_name,
        'image' => asset('images/banner/article.png'),
    ])
</main>
