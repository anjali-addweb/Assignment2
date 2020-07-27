<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<div class="main">
  <div class="row">
    <div class="col-3">
    </div>
    <div class="col-6">
    <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
       	
        Select Category:-
        <select name="cid" class="form-control">
          @foreach($cat as $p)
          <option value="{{$p->id}}">{{$p->cate_name}}</option>
          @endforeach
        </select><br>
        <label for="product name">Product Name:-</label>
       	<input type="text" name="pname" placeholder="Enter Productname" class="form-control"><br>
        <label for="price">Price:-</label>
        <input type="text" name="price" placeholder="Enter Price" class="form-control"><br>
        <label for=" discount">Discount:-</label>
        <input type="text" name="discount" placeholder="Enter number" class="form-control"><br>
        <label for=" color">Color:-</label>
        <input type="text" name="color" placeholder="Enter color" class="form-control"><br>
        <label for="image">Image:-</label>
        <input id="image" name="image" multiple type="file" class="form-control"><br>
        <label for=" description">Description:-</label>
        <textarea placeholder="Enter Description" class="form-control" name="desc"></textarea><br>
        <input type="submit">
    </form>
  </div>
  <div class="col-3">
  </div>
</div>
</div>
</body>
</html>