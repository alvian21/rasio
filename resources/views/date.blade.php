<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<form action="{{Route('post')}}" method="POST">
    @csrf
<label for="">Tanggal</label>
<input type="date" name="tanggal" id="tanggal">
<label for="">Future Value</label>
<input type="number" name="future" id="future">
<label for="bunga"> bunga</label>
<input type="text" name="bunga" disabled value="0.055">

    <select  name="hitung">
        <option  value="fv" >fv </option>
    </select>


<button type="submit" name="submit" id="submit">Save</button>

    </form>
</body>
</html>
