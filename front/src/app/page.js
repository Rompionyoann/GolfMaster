"use client"
// Importez les bibliothèques nécessaires
import React from "react";
import { useRouter } from "next/navigation"; // Importez le hook useRouter

// Définissez le composant Landing
export default function Landing() {
  const router = useRouter(); // Initialisez le hook useRouter
  return (
    <div className="relative flex flex-col items-center justify-center min-h-screen overflow-hidden">
      <div className="w-full p-6 bg-white rounded-md shadow-md lg:max-w-xl">
        {/* Grand titre centré en haut de la div principale */}
        <h1 className="text-4xl font-bold text-center mb-4">
          Bienvenue sur GolfMaster
        </h1>

        {/* Paragraphe en dessous du titre */}
        <p className="text-center text-gray-700 mb-4">
          GolfMaster est une application qui vous aidera à suivre vos perfomances durant
          une partie de golf, rejoignez l'aventure en vous connectant.
        </p>

        {/* Bouton "Login" en dessous du paragraphe */}
        <button
          className="bg-blue-500 text-white px-4 py-2 rounded-md"
          onClick={() => {
            // Ajoutez ici le code pour gérer le clic sur le bouton Login
            router.push("/login");
            console.log("Login clicked");
          }}
        >
          Login
        </button>
      </div>
    </div>
  );
}
