<!-- Javascript -->
<script>
  import { createEventDispatcher, onDestroy } from "svelte";

  const dispatch = createEventDispatcher();
  const close = () => dispatch("close");
  let modal;
  const handle_keydown = (e) => {
    if (e.key === "Escape") {
      close();
      return;
    }
    if (e.key === "Tab") {
      // trap focus
      const nodes = modal.querySelectorAll("*");
      const tabbable = Array.from(nodes).filter((n) => n.tabIndex >= 0);
      let index = tabbable.indexOf(document.activeElement);
      if (index === -1 && e.shiftKey) index = 0;
      index += tabbable.length + (e.shiftKey ? -1 : 1);
      index %= tabbable.length;
      tabbable[index].focus();
      e.preventDefault();
    }
  };
  const previously_focused =
    typeof document !== "undefined" && document.activeElement;
  if (previously_focused) {
    onDestroy(() => {
      // @ts-ignore
      previously_focused.focus();
    });
  }

  let nomeReceita = "";
  let descricaoReceita = "";
  let ingredientesReceita = "";
  let modoPreparo = "";

  async function cadastrarReceita() {
    let form = new FormData();
    form.append("nomeReceita", nomeReceita);
    form.append("descricaoReceita", descricaoReceita);
    form.append("ingredientesReceita", ingredientesReceita);
    form.append("modoPreparo", modoPreparo);

    const url = "http://localhost:8000/create-receita.php";

    const response = await fetch(url, {
      method: "POST",
      body: form,
      credentials: "include",
    });
    alert("Receita cadastrada");
    close();
  }
</script>

<!-- HTML -->
<svelte:window on:keydown={handle_keydown} />

<div
  class="absolute left-1/2 top-1/2 max-w-4xl w-[100vw] m-h-[100vh - 4em] h-[600px] overflow-auto transform-cpu rounded-lg -translate-x-1/2 -translate-y-1/2 p-1 bg-white"
  role="dialog"
  aria-modal="true"
  bind:this={modal}
>
  <!-- svelte-ignore a11y-click-events-have-key-events -->
  <span
    class="absolute top-1 right-1 mr-2 mt-2 cursor-pointer bg-orange-700 hover:bg-orange-900 transition-all"
    id="fechar"
    on:click={close}
    ><img
      src="https://icongr.am/material/close.svg?size=32&color=ffffff"
      alt="Fechar modal"
    />
  </span>

  <form
    on:submit|preventDefault={cadastrarReceita}
    class="flex flex-col p-4 justify-center items-center h-full gap-6 mx-auto"
  >
    <label for="" class="text-black text-lg flex flex-col text-center w-full">
      Insira o nome da receita
      <input
        type="text"
        class="rounded-lg p-2 text-black ring-2 ring-orange-600 focus:ring-orange-900 focus:ring-2 focus:outline-none"
        minlength="8"
        maxlength="35"
        placeholder="Bolo de laranja"
        bind:value={nomeReceita}
      />
    </label>
    <div class="flex justify-between w-full">
      <label for="" class="text-black text-lg flex flex-col text-center">
        Insira a descrição da receita
        <textarea
          class="rounded-lg p-2 text-black ring-2 ring-orange-600 focus:ring-orange-900 focus:ring-2 focus:outline-none h-64"
          minlength="8"
          placeholder="Este é um prato no estilo sobremesa..."
          bind:value={descricaoReceita}
        />
      </label>
      <label for="" class="text-black text-lg flex flex-col text-center">
        Insira os ingredientes da receita
        <textarea
          class="rounded-lg p-2 text-black ring-2 ring-orange-600 focus:ring-orange-900 focus:ring-2 focus:outline-none h-64"
          minlength="8"
          placeholder="Laranja, Açucar, Trigo..."
          bind:value={ingredientesReceita}
        />
      </label>
      <label for="" class="text-black text-lg flex flex-col text-center">
        Insira o modo de preparo
        <textarea
          class="rounded-lg p-2 text-black ring-2 ring-orange-600 focus:ring-orange-900 focus:ring-2 focus:outline-none h-64"
          minlength="8"
          required
          placeholder="Ex.: Na panela acrescente os ovos, açucar e bata..."
          bind:value={modoPreparo}
        />
      </label>
    </div>
    <button
      class="px-4 py-2 bg-orange-500 rounded-xl text-white font-semibold text-lg
     transition-all hover:bg-orange-800">Nova receita</button
    >
  </form>
</div>
