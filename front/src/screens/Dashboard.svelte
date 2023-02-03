<!-- Javascript -->
<script>
  import ModalRegistroReceita from "../components/ModalRegistroReceita.svelte";
  import Receita from "../components/Receita.svelte";
  import { currentPage, isLogged } from "../store";

  let showModal = false;

  function logout() {
    fetch("http://localhost:8000/logout.php", {
      credentials: "include",
    });
    $isLogged = false;
    $currentPage = "index";
  }
  console.log($isLogged);
</script>

<!-- HTML -->
<div
  class="mt-8 border-b-2 border-green-700 flex flex-col items-center justify-center pb-4 w-screen"
>
  <button
    class="h-16 w-16 bg-black text-white font-extrabold text-6xl rounded-full text-center mb-2 cursor-pointer"
    id="adicionar-receita"
    on:click={() => (showModal = true)}
  >
    +
  </button>
  <h1 class="text-black font-bold text-2xl">
    Clique aqui para inserir uma receita
  </h1>
</div>

<Receita />

<button
  class="bg-green-800 py-6 px-8 mr-2 mb-2 font-extrabold text-xl rounded hover:bg-green-900 transition-all text-slate-200 fixed right-1 bottom-1"
  on:click={logout}
>
  Deslogar
</button>

{#if showModal}
  <!-- svelte-ignore missing-declaration -->
  <ModalRegistroReceita on:close={() => (showModal = false)} />
{/if}
