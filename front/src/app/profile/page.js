"use client";

import React from "react";
import Navbar from "../components/navbar.js";
import AuthChecker from "../components/authchecker.js";
import Cookies from "js-cookie";

export default function Profile() {
  const handleLogout = () => {
    // Supprimez le cookie de l'utilisateur
    Cookies.remove("token");
    // Redirigez l'utilisateur vers la page de connexion
    window.location.href = "/login";
  };

  return (
    <AuthChecker>
      <div className="relative flex flex-col items-center justify-center min-h-screen overflow-hidden">
        <div className="w-full p-6 bg-white rounded-md shadow-md lg:max-w-xl">
          <h1 className="text-1xl font-bold text-center text-gray-700">
            Yokhaii
          </h1>

          {/* Image centrée dans un cercle en haut de la div */}
          <div className="flex items-center justify-center mt-4">
            <div className="w-20 h-20 bg-gray-300 rounded-full overflow-hidden">
              <img
                src="url_de_l_image"
                alt="Profile"
                className="w-full h-full object-cover"
              />
            </div>
          </div>

          {/* Bouton de déconnexion sous l'image */}
          <div className="text-center mt-4">
            <button
              onClick={handleLogout}
              className="bg-red-500 text-white px-4 py-2 rounded-md"
            >
              Déconnexion
            </button>
          </div>

          {/* Tableau 3x3 centré en dessous */}
          <table className="mt-4 mx-auto">
            <tbody>
              {Array.from({ length: 3 }, (_, rowIndex) => (
                <tr key={rowIndex}>
                  {Array.from({ length: 3 }, (_, colIndex) => (
                    <td key={colIndex} className="border px-4 py-2">
                      Cellule {rowIndex * 3 + colIndex + 1}
                    </td>
                  ))}
                </tr>
              ))}
            </tbody>
          </table>
          <Navbar />
        </div>
      </div>
    </AuthChecker>
  );
}
