<!-- Javascript -->
<script defer>
  import { onMount } from "svelte";
  let receitas = [];
  async function load() {
    const response = await fetch("http://localhost:8000/get-receitas.php", {
      credentials: "include",
    });
    if (!response.ok) {
      alert("Você não está logado!");
      return;
    }
    receitas = await response.json();
  }
  onMount(() => {
    load();
  });
</script>

<!-- HTML -->

<div
  class="w-full h-full mx-auto px-8 grid grid-cols-2 items-center justify-center pt-4 gap-y-2 pb-4 justify-items-center overflow-x-hidden"
>
  {#each receitas as receita}
    <div
      class="rounded-lg flex flex-col w-[75%] h-96 p-2 transition-all hover:w-[90%] hover:h-[450px] ring-2 ring-black bg-white break-all text-center items-center justify-evenly"
      id="card"
    >
      <div>
        <h1 class="text-orange-600 font-extrabold text-lg">
          {receita.RECEITA_NOME}
        </h1>
        <p>
          {receita.RECEITA_DESCRICAO}
        </p>
      </div>
      <div>
        <div class="flex gap-16" id="conteudo-card">
          <div>
            <h2>Ingredientes</h2>
            <p>{receita.RECEITA_INGREDIENTES}</p>
          </div>
          <div>
            <h2>Modo de preparo</h2>
            <p>{receita.RECEITA_PREPARO}</p>
          </div>
        </div>
      </div>
    </div>
  {/each}
</div>
