<!-- Javascript -->
<script>
  import { currentPage } from "../store";
  import Botao from "../components/Botao.svelte";

  let email = "";
  let senha = "";

  function logandoUsuario() {
    let form = new FormData();
    form.append("email", email);
    form.append("senha", senha);

    const url = "http://localhost:8000/login.php";

    fetch(url, {
      method: "POST",
      body: form,
    });
  }
</script>

<!-- HTML -->
<form
  class="flex flex-col text-white items-center gap-2"
  on:submit|preventDefault={logandoUsuario}
>
  <h1 class="font-semibold text-2xl">Logue na plataforma</h1>
  <!-- svelte-ignore a11y-label-has-associated-control -->
  <label class="flex flex-col items-center">
    Cadastre seu email
    <input
      type="email"
      required
      bind:value={email}
      class="px-4 py-2 rounded-lg text-orange-900 font-semibold"
    />
  </label>
  <label class="flex flex-col items-center" for=""
    >Cadastre sua senha<input
      type="password"
      required
      bind:value={senha}
      class="px-4 py-2 rounded-lg text-orange-900 font-semibold mb-2"
    />
  </label>
  <Botao><span slot="button-child">Login no sistema</span></Botao>
  <!-- svelte-ignore a11y-click-events-have-key-events -->
  <span
    class="text-lg text-gray-600 hover:text-gray-800 underline cursor-pointer mt-4"
    on:click={() => ($currentPage = "index")}>Ainda não possuo login</span
  >
</form>
