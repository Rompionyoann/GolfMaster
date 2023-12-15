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
          <h1 className="text-3xl font-bold text-center text-white">Finished Round</h1>

          {/* Tableau avec 2 colonnes et 9 lignes */}
          <div className="mt-4">
            <table className="table-auto mx-auto">
              <thead>
                <tr>
                  <th className="border px-4 py-2">Colonne 1</th>
                  <th className="border px-4 py-2">Colonne 2</th>
                </tr>
              </thead>
              <tbody>
                {/* 9 lignes */}
                {Array.from({ length: 9 }, (_, index) => (
                  <tr key={index}>
                    <td className="border px-4 py-2">Donnée {index + 1}</td>
                    <td className="border px-4 py-2">Donnée {index + 1}</td>
                  </tr>
                ))}
              </tbody>
            </table>
          </div>

          {/* Bouton "Voir le profil" */}
          <button
            className="bg-blue-500 text-white px-4 py-2 rounded-md mt-4"
            onClick={() => {
              // Ajoutez ici le code pour voir le profil
              router.push("/profile");
              console.log("Voir le profil");
            }}
          >
            Voir le profil
          </button>
        </div>
      </div>
    </AuthChecker>
  );
}
