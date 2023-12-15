"use client";
// Importez les dépendances nécessaires
import React, { useState, useEffect } from "react";
import Navbar from "../components/navbar.js";
import AuthChecker from "../components/authchecker.js";
import { useRouter } from 'next/navigation';
import Cookies from "js-cookie";

export default function Home() {
  const [clubs, setClubs] = useState([]);
  const router = useRouter();

  const handlePlayClick = () => {
    // Rediriger vers la page "/counting"
    //@todo a modification of a reducer from the store
    router.push('/counting');
  };

  useEffect(() => {
    // Effectuez une requête API GET pour récupérer les clubs
    const fetchClubs = async () => {
      try {
        const token = Cookies.get("token"); // Récupérez le token depuis les cookies

        const response = await fetch("http://127.0.0.1:8000/api/clubs", {
          headers: {
            Authorization: `Bearer ${token}`, // Ajoutez le token à l'en-tête
          },
        });

        if (response.ok) {
          const data = await response.json();
          console.log("Fetched clubs:", data);
          setClubs(data); // Mettez à jour l'état avec les données des clubs
        } else {
          console.log("Failed to fetch clubs");
        }
      } catch (error) {
        console.error("Error during fetching clubs:", error);
      }
    };

    fetchClubs(); // Appelez la fonction pour récupérer les clubs au chargement de la page
  }, []); // Le tableau de dépendances vide signifie que cela ne s'exécute qu'une fois au chargement initial de la page

  const [selectedClub, setSelectedClub] = useState(null);

  // Fonction pour gérer le clic sur un rectangle
  const handleClubClick = (title, subtitle, imageUrl) => {
    setSelectedClub({ title, subtitle, imageUrl });
  };

  // Fonction pour fermer le pop-up
  const closePopup = () => {
    setSelectedClub(null);
  };

  return (
    <AuthChecker>
      <div className="relative flex flex-col items-center justify-center min-h-screen overflow-hidden">
        <div className="w-full p-6 bg-white rounded-md shadow-md lg:max-w-xl">
          <h1 className="text-3xl font-bold text-center text-gray-700">
            Clubs
          </h1>

          {/* Liste de rectangles avec titres, sous-titres et images */}
          <div className="flex flex-col mt-4">
            {/* Premier rectangle */}
            <div
              className="bg-gray-200 p-4 rounded-md mb-4 cursor-pointer"
              onClick={() =>
                handleClubClick("Titre 1", "Sous-titre 1", "url_de_l_image_1")
              }
            >
              <h2 className="text-xl font-semibold text-gray-800">Golf BlueGreen de Saint-Jacques</h2>
              <p className="text-gray-600">Le Temple du Cerisier, Temple du Cerisier</p>
              <img
                src="url_de_l_image_1"
                alt="Image 1"
                className="mt-2 rounded-md"
              />
            </div>

            {/* Deuxième rectangle */}
            <div
              className="bg-gray-200 p-4 rounded-md mb-4 cursor-pointer"
              onClick={() =>
                handleClubClick("Titre 2", "Sous-titre 2", "url_de_l_image_2")
              }
            >
              <h2 className="text-xl font-semibold text-gray-800">Golf Municipal de Cesson-Sévigné</h2>
              <p className="text-gray-600">43 Bd de Dézerseul, 35510 Cesson-Sévigné</p>
              <img
                src="url_de_l_image_2"
                alt="Image 2"
                className="mt-2 rounded-md"
              />
            </div>

            {/* Troisième rectangle */}
            <div
              className="bg-gray-200 p-4 rounded-md mb-4 cursor-pointer"
              onClick={() =>
                handleClubClick("Titre 3", "Sous-titre 3", "url_de_l_image_3")
              }
            >
              <h2 className="text-xl font-semibold text-gray-800">Golf de la freslonnière</h2>
              <p className="text-gray-600">Le Bois Briand, 35650 Le Rheu</p>
              <img
                src="url_de_l_image_3"
                alt="Image 3"
                className="mt-2 rounded-md"
              />
            </div>

            {/* Pop-up centré sur l'écran */}
            {selectedClub && (
              <div className="fixed inset-0 flex items-center justify-center">
              <div className="bg-white p-12 rounded-md shadow-md">
                <h2 className="text-xl font-semibold text-gray-800">
                  {selectedClub.title}
                </h2>
                <p className="text-gray-600">{selectedClub.subtitle}</p>
            
                {/* First Rectangle */}
                <div className="mt-4 p-8 bg-gray-200 rounded-md">
                  <h3 className="text-xl font-semibold text-gray-800">
                    18 trous
                  </h3>
                  <p className="text-gray-600">6000m</p>
                  <button
                    className="bg-blue-500 text-white py-1 px-2 rounded-md float-right"
                    onClick={handlePlayClick}
                  >
                    Play
                  </button>
                </div>
            
                {/* Second Rectangle */}
                <div className="mt-4 p-8 bg-gray-200 rounded-md">
                  <h3 className="text-xl font-semibold text-gray-800">
                   9 trous
                  </h3>
                  <p className="text-gray-600">3000m</p>
                  <button
                    className="bg-green-500 text-white py-1 px-2 rounded-md float-right"
                    onClick={handlePlayClick}
                  >
                    Play
                  </button>
                </div>
            
                <button
                  className="bg-red-500 text-white py-2 px-4 rounded-md mt-4"
                  onClick={closePopup}
                >
                  Fermer
                </button>
              </div>
            </div>
            
            )}

            <Navbar />
          </div>
        </div>
      </div>
    </AuthChecker>
  );
}
