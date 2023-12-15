// AuthChecker.js
"use client";

import { useEffect } from "react";
import { useRouter } from "next/navigation";
import Cookies from "js-cookie";

const AuthChecker = ({ children }) => {
  const router = useRouter();

  useEffect(() => {
    const token = Cookies.get("token");

    // Si le cookie n'existe pas, redirigez l'utilisateur vers la page de connexion
    if (!token) {
      router.push("/login");
    }
  }, []);

  return <>{children}</>;
};

export default AuthChecker;
