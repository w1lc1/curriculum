@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h1>Main</h1>
                <form action="{{ url('admin/sns') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <textarea class="form-control" name="body" id="body" placeholder="いまどうしてる?">{{ old('body') }}</textarea>
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-primary mt-2 px-5 py-2">つぶやく</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 mx-auto mt-4">
                <div class="row">
                    <table class="table table-light">
                        <tbody>
                            @foreach ($posts as $tweet)
                            <tr>
                                <td>
                                    <p>
                                        @if ($tweet->user)
                                            {{ $tweet->user->name }}
                                        @else
                                            User not found
                                        @endif
                                        <span style="float: right">{{ $tweet->created_at }}</span>
                                    </p>
                                    <strong>{{ Str::limit($tweet->body, 500) }}</strong>
                                    @if ($user && $tweet->user && $tweet->user->id === $user->id)
                                    <!-- ログインユーザーが投稿したつぶやきの削除リンクを表示 -->
                                    <span style="float: right"><a href="{{ url('admin/sns/delete?id='.$tweet->id)}}">削除</a></span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
