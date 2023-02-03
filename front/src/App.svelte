<!-- Javascript -->
<script>
  // @ts-nocheck
  import { currentPage, isLogged } from "./store";

  import Header from "./components/Header.svelte";
  import QuemSomos from "./components/QuemSomos.svelte";
  import Cadastro from "./screens/Cadastro.svelte";
  import Login from "./screens/Login.svelte";
</script>

<!-- HTML -->
<main
  class="bg-orange-500 w-screen h-screen flex items-center justify-center flex-col"
>
  {#if !isLogged == false}
    <div
      class="bg-gray-600 w-[80%] h-[90%] flex items-center gap-20 justify-center mx-auto rounded-3xl"
    >
      <div
        class="flex flex-col items-center justify-center bg-orange-500 rounded-lg py-4 px-8 h-[75%]"
      >
        <Header />
        {#if $currentPage == "index"}
          <Cadastro />
        {:else if $currentPage == "login"}
          <Login />
        {/if}
      </div>
      <QuemSomos />
    </div>
  {/if}
</main>
