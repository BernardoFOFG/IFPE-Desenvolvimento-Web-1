<!-- Javascript -->
<script>
  // @ts-nocheck
  import { currentPage } from "../store";
  import axios from "axios";
  import Botao from "../components/Botao.svelte";

  let nome = "";
  let email = "";
  let senha = "";
  let confSenha = "";

  async function criandoUsuario() {
    if (senha != confSenha) return;
    let form = new FormData();
    form.append("nome", nome);
    form.append("email", email);
    form.append("senha", senha);

    const url = "http://localhost:8000/create-usuario.php";
    const urlValidacao = "http://localhost:8000/validando-create-usuario.php";
    axios.get(urlValidacao).then((response) => {
      const validacaoUsuario = response.data;

      const filtrandoEmail = validacaoUsuario.map((validando) => {
        return validando.USUARIO_EMAIL;
      });
      let filtrandoEmailEspecifico = filtrandoEmail.find(
        (element) => element === email
      );
      if (filtrandoEmailEspecifico === email) {
        alert("Email já sendo utilizado!");
      } else {
        fetch(url, {
          method: "POST",
          body: form,
        });
      $currentPage = "login"
      }
    });
  }
</script>

<!-- HTML -->
<form
  class="flex flex-col text-white items-center gap-2"
  on:submit|preventDefault={criandoUsuario}
>
  <h1 class="font-semibold text-2xl">Insira seus dados</h1>
  <!-- svelte-ignore a11y-label-has-associated-control -->
  <label class="flex flex-col items-center">
    Cadastre seu nome
    <input
      type="text"
      required
      bind:value={nome}
      class="px-4 py-2 rounded-lg text-orange-900 font-semibold"
    />
  </label>
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
      class="px-4 py-2 rounded-lg text-orange-900 font-semibold"
      minlength="6"
      maxlength="16"
    />
  </label>
  <label class="flex flex-col items-center" for=""
    >Repita sua senha<input
      type="password"
      required
      bind:value={confSenha}
      class="px-4 py-2 rounded-lg text-orange-900 font-semibold mb-2"
      minlength="6"
      maxlength="16"
    /></label
  >
  <Botao><span slot="button-child">Cadastre no sistema</span></Botao>

  <!-- svelte-ignore a11y-click-events-have-key-events -->
  <span
    class="text-lg text-gray-600 hover:text-gray-800 underline cursor-pointer mt-4"
    on:click={() => ($currentPage = "login")}>Já possuo cadastro</span
  >

  {#if senha != "" && senha != confSenha}
    <div class="fixed left-1 bottom-1 bg-red-600 py-2 px-4 text-white rounded">
      Senhas não conferem
    </div>
  {/if}
</form>
