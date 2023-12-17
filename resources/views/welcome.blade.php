<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add Google Recaptcha</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h2>Register form</h2>
  <form action="{{ route('register') }}" method="post">
    @csrf
    <div class="mb-3 mt-3">
      <label for="email">Email:</label>
      <input type="email" class="form-control" placeholder="Enter email" name="email">
      @error('email')
        <div class="text text-danger">{{ $message }}</div>
      @enderror
    </div>
    
    <div class="mb-3">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" placeholder="Enter password" name="password">
      @error('password')
        <div class="text text-danger">{{ $message }}</div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="pwd">Confirm Password:</label>
      <input type="password" class="form-control" placeholder="Re-enter password" name="password_confirmation">
      @error('password_confirmation')
        <div class="text text-danger">{{ $message }}</div>
      @enderror
    </div>
    <div class="mb-3">
        {!! NoCaptcha::renderJs() !!}
        {!! NoCaptcha::display() !!}
        @error ('g-recaptcha-response')
        <div class="text text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-check mb-3">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="remember"> Remember me
      </label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

</body>
</html>
