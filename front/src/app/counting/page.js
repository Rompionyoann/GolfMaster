"use client";
// Importez les bibliothèques nécessaires
import React, { useState } from "react";
import { useRouter } from "next/navigation";
import AuthChecker from "../components/authchecker.js";

// Définissez le composant Counting
export default function Counting() {
  // État local pour le compteur
  const [count, setCount] = useState(0);

  // Fonction d'incrémentation du compteur
  const increment = (amount) => {
    return () => {
      setCount(count + amount);
    };
  };
  const router = useRouter();

  return (
    <AuthChecker>
      <div className="relative flex flex-col items-center justify-center min-h-screen overflow-hidden">
        <div className="w-full p-6 bg-black rounded-md shadow-md lg:max-w-xl">
          <h1 className="text-3xl font-bold text-center text-white">Hole n°1</h1>

          {/* Image centrée dans la div */}
          <div className="text-center mt-4">
            <img
              src="url_de_l_image"
              alt="Image"
              className="mx-auto rounded-md border border-white p-4"
              style={{ width: '300px', height: '300px' }}
            />

            {/* Bouton "Trou suivant" à droite de l'image */}
            <button
              className="bg-blue-500 text-white px-4 py-2 rounded-md ml-4"
              onClick={() => {
                // Ajoutez ici le code pour passer au trou suivant
                console.log("Passer au trou suivant");
              }}
            >
              Trou suivant
            </button>
          </div>

          {/* Chiffre blanc centré en dessous de l'image */}
          <p className="text-white text-4xl mt-4">{count}</p>

          {/* Trois boutons horizontaux */}
          <div className="flex justify-center mt-4">
            <button
              className="bg-green-500 text-white px-4 py-2 rounded-md mr-2"
              onClick={increment(1)}
            >
              +1
            </button>
            <button
              className="bg-orange-500 text-white px-4 py-2 rounded-md mr-2"
              onClick={increment(2)}
            >
              +2
            </button>
            <button
              className="bg-red-500 text-white px-4 py-2 rounded-md"
              onClick={increment(3)}
            >
              +3
            </button>
          </div>
          <button
          className="bg-blue-500 text-white px-4 py-2 rounded-md ml-4"
          onClick={() => {
            router.push("/endround");
            console.log("End Round");
          }}
        >
          End Round
        </button>
        </div>

        {/* Bouton "End Round" en bas à droite */}
      </div>
    </AuthChecker>
  );
}
