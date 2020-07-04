<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
</head>
<body>
<div class="container mt-2">
    <form action="{{route('addCategory')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Save Category</button>
    </form>

    <form action="{{route('addSubCategory')}}" method="POST">
        @csrf
        <div class="form-group">
            <select name="parent_id" id="">
                <option value="">Select Category</option>
                @foreach($parentCategories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control">
        </div>
        <button type="submit">Save Subcategory</button>
    </form>

    <form action="{{route('addSubCategory')}}" method="POST">
        @csrf
        <div class="form-group">
            <select name="parent_id" id="">
                <option value="">Select Category</option>
                @foreach($parentCategories as $category)
                    @if(count($category->subcategory))
                        @foreach($category->subcategory as $value)
                            <option value="{{$value->id}}">{{$value->name}}</option>
                        @endforeach
                    @endif
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control">
        </div>
        <button type="submit">Save PostSubcategory</button>
    </form>

    <form action="{{route('addSubCategory')}}" method="POST">
        @csrf
        <div class="form-group">
            <select name="parent_id" id="">
                <option value="">Select Category</option>
                @foreach($parentCategories as $category)
                    @if(count($category->subcategory))
                        @foreach($category->subcategory as $value)
                            @foreach($value->subcategory as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        @endforeach
                    @endif
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control">
        </div>
        <button type="submit">Save PostPostSubcategory</button>
    </form>
    <table id="category" class="table table-striped table-bordered" style="width:100%">
        <thead>
        <thead>
        <tr>
            <th>Category Name</th>
            <th>Subcategory</th>
        </tr>
        </thead>
        <tbody>
        @foreach($parentCategories as $category)
            <tr>
                <td>{{$category->name}}</td>
                <td>
                    @if(count($category->subcategory))
                        @include('products.subCategoryList',['subcategories' => $category->subcategory])
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function () {
        $('#category').DataTable();
    });
</script>
</html>
