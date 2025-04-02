<div class="flex justify-center align-middle">
    <form action="{{ route('submit.form') }}" method="POST">
        @csrf
        <label>Vardas:</label>
        <input type="text" name="name" required>

        <label>El. paštas:</label>
        <input type="email" name="email" required>

        <label>Žinutė:</label>
        <textarea name="message" required></textarea>

        <button type="submit">Siųsti</button>
    </form>
    <img src="{{ asset('assets/smiley.gif') }}" width="80px" height="80px" alt="welcome smile">
</div>