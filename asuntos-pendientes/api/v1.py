from fastapi import APIRouter

router = APIRouter()


@router.get("/")
def get_asuntos_pendientes():
    return "Asuntos pendientes app created!"
