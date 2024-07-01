
    
    <div class="row"><p><?= htmlspecialchars($info) ?></p></div>
    <form method="post" action="/home/login">
        
        <label for="E-Mail">E-Mail</label>
        <input name="user[email]" value="">

        <label for="password">Password</label>
        <input name="user[password]" value="">

        <button>save</button>
    </form>