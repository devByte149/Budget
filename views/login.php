<div class="row">
    <form class="six columns offset-by-three" action="index.php?action=validate" method="POST">
        <h5 class="text-center">Please Log In</h5>
        
        <!-- Username Field -->
        <label for="usernameInput">Your Username</label>
        <input 
            class="u-full-width" 
            type="text" 
            placeholder="username" 
            id="usernameInput" 
            name="username"
            required>
            
        <!-- Password Field -->
        <label for="passwordInput">Your Password</label>
        <input 
            class="u-full-width" 
            type="password" 
            placeholder="password" 
            id="passwordInput" 
            name="password"
            required>
            
        <!-- Submit Button -->
        <input 
            class="button-primary u-full-width" 
            type="submit" 
            value="Log In">
    </form>
</div>
